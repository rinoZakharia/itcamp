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
            <th scope="col">Email</th>
            <th scope="col">Instansi</th>
            <th scope="col">Tanggal Daftar</th>

          </tr>
        </thead>
        <tbody>
          <?php $count = 1 ?>
          @foreach($data as $a)
          <tr>
            <th scope="row"><a href="#">{{$count;}}</a></th>
            <td>{{$a->nama}}</td>
            <td>{{$a->email}}</td>
            <td>{{$a->instansi}}</td>
            <td>{{$a->created_at}}</td>
          </tr>
          <?php $count++ ?>
          @endforeach
        </tbody>
      </table>

    </div>

  </div>
</div>
@endsection
