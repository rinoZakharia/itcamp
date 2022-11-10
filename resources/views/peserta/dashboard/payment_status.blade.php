@extends("peserta.layout")
@section("content")
<div class="nk-block">
    <div class="card mx-3">
        <div class="card-inner card-inner-lg">
            <!-- status pembayaran -->
            <div class="nk-block-head">
                <!-- add icon success center-->
                <div class="nk-block-head-content text-center">
                    <!-- icon checked -->
                    @if($data->flag == 1)
                    <h2 class="icon ni ni-check text-success"></h2>
                    @elseif($data->flag == 0)
                    <h2 class="icon ni ni-archived text-warning"></h2>
                    @endif
                    <h4 class="nk-block-title">Status Pembayaran</h4>
                    @if($data->flag == 1)
                    <div class="nk-block-des">
                        <p>Terima kasih telah melakukan pembayaran</p>
                    </div>
                    @elseif($data->flag == 0)
                    <div class="nk-block-des">
                        <p>Terima kasih telah melakukan pembayaran, pembayaran anda sedang kami proses</p>
                    </div>
                    @endif
                </div>
                <!-- payment information two column  -->
                <div class="nk-block-head-content mt-4 order-status">
                    <ul>
                        <li>
                            <div>Nama:</div>
                            <div>{{$data->user->nama}}</div>
                        </li>
                        <li>
                            <div>Email:</div>
                            <div>{{$data->email}}</div>
                        </li>
                        <li>
                            <div>Tanggal Bayar:</div>
                            <div>{{$data->tglDaftar}}</div>
                        </li>
                        <li>
                            <div>Metode Pembayaran:</div>
                            <div>{{$data->bank}}</div>
                        </li>
                        @if($data->flag == 1)
                        <li>
                            <div>Tanggal Konfirmasi:</div>
                            <div>{{$data->tglAcc}}</div>
                        </li>
                        @endif
                        <li>
                            <div>Status:</div>
                            @if($data->flag == 1)
                            <div>Dikonfirmasi</div>
                            @elseif($data->flag == 0)
                            <div>Pending</div>
                            @endif
                        </li>
                    </ul>
                </div>


            </div>

        </div>
    </div>

</div>
@endsection
