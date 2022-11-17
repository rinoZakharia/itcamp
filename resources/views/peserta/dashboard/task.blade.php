@extends("peserta.layout")
@section("content")
<style>
   .message_event strong{
        font-weight: bold;
        color:#364a63;
    }
    .message_event li{
        list-style-type: disc;
        margin-bottom: 8px;
        margin-left: 24px;
    }
</style>
<div class="nk-block">
    <div class="card">
        <div class="card-inner card-inner-lg">

            <!-- title task -->
            <div class="nk-block message_event">
                <h4 class="nk-block-title">{{$data->judul}}</h4>
            </div>
            <!-- detail created at,file downlod  -->
            <div class="nk-block message_event">
                <p class="text-soft">Dibuat pada : {{$data->created_at}}</p>
                @if($data->file != null)
                <p class="text-soft">File : <a class="ml-1 btn btn-sm btn-success" href="{{asset('uploads/tugas/'.$data->file)}}"><em class="icon ni ni-download mr-1"></em>{{$data->file}}</a></p>
                @endif
            </div>
            <div class="nk-block message_event">
                    {!! $data->materi !!}
            </div>
        </div>
    </div>
</div>
@endsection
