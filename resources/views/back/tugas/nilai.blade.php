@extends('back.layout')
@section('content')
<div class="col-12">
  <div class="card recent-sales overflow-auto">

    <div class="card-body">
      <h5 class="card-title">Tabel Data <span>| Tugas</span></h5>

      <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Tugas</th>
            <th class="w-25" scope="col">Action</th>
            <th scope="col">Detail</th>
          </tr>
        </thead>
        <tbody>
          <?php $count = 1 ?>
          @foreach($data[1] as $a)
          <tr>
              @if ($a->created_at > $a->tugas->deadline)
              <th scope="row">{{$count;}}  <span class="badge bg-danger">Terlambat</span></th>
              @else
              <th scope="row">{{$count;}}  <span class="badge bg-success">Tepat waktu</span></th>
              @endif
              <td>{{$a['user']["nama"]}}</td>
              <td>{{$a['user']["email"]}}</td>
              <td>{{$a['tugas']['judul']}}</td>
              <td>
                  <form action="/back/penilaian/edit/{{$a['idJawab']}}" method="post">
                      @method('put')
                      @csrf
                      <div class="row">
                          <div class="col-sm-6">
                              <input type="number" class="form-control" name="nilai" id="nilai" value="{{$a["nilai"]}}">
                          </div>
                          <button type="submit" class="btn btn-success btn-sm col-sm-3 col-form-label">Edit Nilai</button>
                      </div>
                  </form>
              </td>
              <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detail{{$a['idJawab']}}">Detail</button></td>
          </tr>
          <?php $count++ ?>
          <!-- Modal Tugas-->
          <div class="modal fade" id="detail{{$a['idJawab']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Tugas</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <textarea class="form-control" readonly>{{$a["jawaban"]}}</textarea>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </tbody>
      </table>

    </div>

  </div>
</div>
@endsection