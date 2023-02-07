@extends('back.layout')
@section('content')
<div class="col-12">
  <div class="card recent-sales overflow-auto">

    <div class="card-body">
      <h5 class="card-title">Tabel Data <span>| Peserta</span></h5>

      <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Kelompok</th>
            <th scope="col">Jumlah Tugas</th>
            <th scope="col">Rata-rata nilai</th>
            <th scope="col">Total nilai</th>
            <th scope="col">Jumlah absen</th>
          </tr>
        </thead>
        <tbody>
          <?php $count = 1 ?>
          @foreach($data as $a)
          <tr>
            <th scope="row"><a href="#">{{$count;}}</a></th>
            <td>{{$a->nama}}</td>
            <td>{{$a->kelompok}}</td>
            <td>{{$a->jumlahtugas}}</td>
            <td>{{$a->ratanilai}}</td>
            <td>{{$a->totalnilai}}</td>
            <td>{{$a->jumlahabsen}}</td>
          </tr>
          <?php $count++ ?>
          @endforeach
        </tbody>
      </table>

    </div>

  </div>
</div>
@endsection
