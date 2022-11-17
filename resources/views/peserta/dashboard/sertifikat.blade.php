@extends("peserta.layout")
@section("content")
<div class="nk-block">
    <div class="card">
        <div class="card-inner card-inner-lg">

            <!-- title task -->
            <div class="nk-block">
                <h4 class="nk-block-title text-center">Sertifikat</h4>
            </div>
            <!-- detail created at,file downlod  -->

            <div class="nk-block text-center">
                <img class="img-fuild " src="{{asset('uploads/sertifikat/'.session()->get('email.peserta').'.png')}}" alt="">

            </div>
            <div class="nk-block text-center">
                <a download href="{{asset('uploads/sertifikat/'.session()->get('email.peserta').'.png')}}"  class="btn btn-success"><em class="icon ni ni-download mx-1"></em> Download</a>
            </div>
        </div>
    </div>
</div>
@endsection
