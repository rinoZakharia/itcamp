@extends("peserta.layout")
@section("content")
<div class="nk-block">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card mb-1">
                <div class="card-inner card-inner-lg">
                    <!-- status pembayaran -->
                    <div class="nk-block-head">
                        <!-- add icon success center-->
                        <div class="nk-block-head-content text-center">
                            <!-- icon checked -->

                            <h2 class="icon ni ni-check text-success"></h2>
                            <h4 class="nk-block-title">Status Absensi</h4>
                            <div class="nk-block-des">
                                <p>Anda telah berhasil absen</p>
                            </div>
                        </div>
                        <!-- payment information two column  -->
                        <div class="nk-block-head-content mt-4 order-status">
                            <ul>
                                <li>
                                    <div>Nama:</div>
                                    <div>{{$detail->user->nama}}</div>
                                </li>
                                <li>
                                    <div>Email:</div>
                                    <div>{{$detail->email}}</div>
                                </li>
                                <li>
                                    <div>Tanggal Absen:</div>
                                    <div>{{$detail->created_at}}</div>
                                </li>
                            </ul>
                            <div class="form-group mt-2">
                                <label class="form-label" for="default-06">Review</label>
                                <textarea disabled class="form-control">{{$detail->review}}</textarea>
                            </div>

                            <div class="form-group mt-2">
                                <label class="form-label" for="default-06">Kesan & Pesan</label>
                                <textarea disabled class="form-control">{{$detail->kesan}}</textarea>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
