@extends('back.layout')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">

        <div class="card-body">
            <h5 class="card-title">Tabel Data <span>| Absen {{$absensi->judul}}</span></h5>
            <p class="text-muted">{{date_format(date_create($absensi->mulai),"Y-m-d H:i")}} - {{date_format(date_create($absensi->selesai),"Y-m-d H:i")}}</p>
            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jam Absensi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1 ?>
                    @foreach($data as $a)
                    <tr>
                        <th scope="row"><a href="#">{{$count;}}</a></th>
                        <td>{{$a->user->nama}}</td>
                        <td>{{$a->created_at}}</td>
                        <td class="text-primary">
                            <button  data-bs-toggle="modal" data-bs-target="#detailAbsen{{$a->id}}"  class="btn btn-outline-primary btn-sm"><i class="bi bi-info-circle"></i> Detail</button>
                        </td>
                    </tr>
                    <?php $count++ ?>
                    <div class="modal fade" data-bs-keyboard="false" data-bs-backdrop="static" id="detailAbsen{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Absensi</h5>
                                </div>
                                <div class="modal-body">
                                    <img src="{{url('uploads/absensi') .'/'.$a->screenshoot}}" alt="" class="img-fluid">
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" value="{{$a->user->nama}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jam Absensi</label>
                                        <input type="text" class="form-control" value="{{$a->created_at}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Review</label>
                                        <textarea name="" id="" rows="4" class="form-control" readonly>{{$a->review}}</textarea>
                                    </div>
                                    <!-- kesan -->
                                    <div class="form-group mb-3">
                                        <label for="">Kesan & Pesan</label>
                                        <textarea name="" id="" rows="4" class="form-control" readonly>{{$a->kesan}}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
