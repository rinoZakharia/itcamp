@extends('back.layout')
@section('content')
<div class="col-12">
  <div class="card recent-sales overflow-auto">

    <div class="card-body">
      <h5 class="card-title">Tabel Data <span>| Tugas</span></h5>
      <div class="row p-3">
        <a class="btn btn-secondary col-sm-1 col-form-label" id="cari" href="{{ url('/back/penilaian/') }}">Cari Tugas</a>
        <div class="col-sm-3">
          <select name="tugas" id="tugas" class="form-select" aria-label="Default select example">
            <option value="" disabled selected hidden>Pilih Tugas</option>
            @foreach($data[0] as $a)
                <option value="{{$a->idTugas}}">{{$a->judul}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Tugas</th>
            <th scope="col">Nilai</th>
            <th scope="col">Detail</th>
          </tr>
        </thead>
        <tbody>
          <?php $count = 1 ?>
          @foreach($data[1] as $a)
            @foreach($a->jawab as $jwb)
            <tr>
                <th scope="row"><a href="#">{{$count;}}</a></th>
                <td>{{$jwb["email"]}}</td>
                <td>{{$a->judul}}</td>
                <td style="width: 30%">
                    <form action="/back/penilaian/edit/{{$jwb['idJawab']}}/{{$jwb['idTugas']}}" method="post">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="nilai" id="nilai" value="{{$jwb["nilai"]}}">
                            </div>
                            <button type="submit" class="btn btn-success btn-sm col-sm-2 col-form-label">Edit Nilai</button>
                        </div>
                    </form>
                </td>
                <td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detail{{$jwb['idJawab']}}">Detail</button></td>
            </tr>
            <?php $count++ ?>
            <!-- Modal Tugas-->
            <div class="modal fade" id="detail{{$jwb['idJawab']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Tugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <textarea class="form-control" readonly>{{$jwb["jawaban"]}}</textarea>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          @endforeach
        </tbody>
      </table>

    </div>

  </div>
</div>
@endsection
@section("script")
<script>
    const tugas = document.querySelector('#tugas');
    tugas.addEventListener('change', function() {
        document.getElementById('cari').href = `${window.location.origin}/back/penilaian/${this.value}`;
    });
</script>
@endsection