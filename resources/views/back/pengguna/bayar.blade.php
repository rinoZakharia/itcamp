@extends('back.layout')
@section('content')
<div class="col-12">
  <div class="card recent-sales overflow-auto">

    <div class="card-body">
      <h5 class="card-title">Pembayaran belum dikonfirmasi</span></h5>

      <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Metode</th>
            <th scope="col">Bukti</th>
            <th scope="col">Tanggal Bayar</th>

            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $count = 1 ?>
          @foreach($delay as $a)
          <tr>
            <th scope="row"><a href="#">{{$count;}}</a></th>
            <td>{{$a->user->nama}}</td>
            <td>{{$a->bank}}</td>
            <!-- button trigger modal  -->
            <td>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#bukti{{$a->id}}">Bukti</button>
                <!-- download -->
                <a download href="{{url('uploads/bukti_pembayaran') .'/'.$a->gambarBayar}}" class="btn btn-sm btn-success">Download</a>
            </td>
            <td>{{$a->tglDaftar}}</td>
            <td>
            <a href="{{route('admin.confirmation',$a->idBayar)}}" class="btn btn-primary btn-sm mb-1">Konfirmasi</a>
              <a href="{{route('admin.reject',$a->idBayar)}}" class="btn btn-danger btn-sm mb-1">Tolak</a>
            </td>
          </tr>
          <?php $count++ ?>
          <!-- make modal show bukti image -->
          <div class="modal fade" id="bukti{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                </div>
                <div class="modal-body">
                    <img src="{{url('uploads/bukti_pembayaran') .'/'.$a->gambarBayar}}" alt="" class="img-fluid">

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

<div class="col-12">
  <div class="card recent-sales overflow-auto">

    <div class="card-body">
      <h5 class="card-title">Pembayaran terkonfirmasi</h5>

      <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Metode</th>
            <th scope="col">Bukti</th>
            <th scope="col">Tanggal bayar</th>
          </tr>
        </thead>
        <tbody>
          <?php $count = 1 ?>
          @foreach($payed as $a)
          <tr>
            <th scope="row"><a href="#">{{$count;}}</a></th>
            <td>{{$a->user->nama}}</td>
            <td>{{$a->bank}}</td>
            <!-- button trigger modal  -->
            <td>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#bukti{{$a->id}}">Bukti</button>
                <!-- download -->
                <a download href="{{url('uploads/bukti_pembayaran') .'/'.$a->gambarBayar}}" class="btn btn-sm btn-success">Download</a>
            </td>
            <td>{{$a->tglDaftar}}</td>
          </tr>
          <?php $count++ ?>
          <!-- make modal show bukti image -->
          <div class="modal fade" id="bukti{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                </div>
                <div class="modal-body">
                    <img src="{{url('uploads/bukti_pembayaran') .'/'.$a->gambarBayar}}" alt="" class="img-fluid">

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
