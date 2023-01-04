@extends("peserta.layout")
@section("content")

<link href="{{ url('peserta/assets/css/editors/tinymce.css') }}" rel="stylesheet">
<style>
   .message_event strong{
        font-weight: bold;
        color:#364a63;
    }
    .message_event img{
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .message_event li{
        list-style-type: disc;
        margin-bottom: 8px;
        margin-left: 24px;
    }
    .message_event blockquote {
        border-left: 2px solid #6d737b;
        margin-left: 1.5rem;
        padding-left: 1rem;
    }
</style>
<div class="nk-block">
    <div class="row">
        @if($data->tipe==1)
        <div class="col-lg-7">
        @else
        <div class="col-lg-10 mx-auto">
        @endif
            <div class="card mb-1">
                <div class="card-inner card-inner-lg">

                    <!-- title task -->
                    <div class="nk-block message_event">
                        <h4 class="nk-block-title">{{$data->judul}}</h4>
                    </div>
                    <!-- detail created at,file downlod  -->
                    <div class="nk-block message_event">
                        <p class="text-soft">Dibuat pada : {{$data->created_at}}</p>

                    </div>
                    <div class="nk-block message_event materi d-none">
                            {!! $data->materi !!}
                    </div>
                    <div class="nk-block message_event ringkasan d-block">
                        <p></p>

                    </div>

                    <div class="mt-2 materi d-none">
                    @if($data->file != null)
                        <a download class="btn btn-sm btn-success" href="{{asset('uploads/tugas/'.$data->file)}}"><em class="icon ni ni-download mr-1"></em>{{$data->file}}</a>
                    @endif
                    </div>
                    <div class="nk-block mt-2 message_event ringkasan d-block">
                        <a href="#" id="readmore" class="text-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        @if($data->tipe==1)
        <div class="col-lg-5">

            <div class="card">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block">
                        <h5 class="nk-block-title">Jawaban</h5>
                        @if(!isset($data['jawaban']))
                        <form action="{{route('peserta.jawab')}}" method="POST">
                            @csrf
                            <input type="hidden" name="idTugas" value="{{$data->idTugas}}">
                            <p class="text-muted mb-4">Masukan Jawaban Anda</p>
                            <textarea name="jawaban" class="form-control"></textarea>
                            <button class="btn btn-primary mt-2">Submit</button>
                        </form>
                        @else
                            <div class="d-none">
                                <!-- make form for delete jawaban-->
                                <form id="deleteJawaban" action="{{route('peserta.delete.jawab')}}" method="POST">
                                    @csrf

                                    <!-- delete -->
                                    @method('DELETE')
                                    <input type="hidden" name="idJawaban" value="{{$data->jawaban->idJawab}}">
                                </form>
                            </div>
                            <!-- make table -->
                            <p class="text-muted mb-4">Anda telah mengumpulkan jawaban</p>
                            <div class="row">
                                <div class="col-5">
                                    <p class="text-weight-bold">Batas Akhir :</p>
                                </div>
                                <div class="col-7">
                                    <p class="text-muted">{{$data->deadline}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <p class="text-weight-bold">Tanggal Pengumpulan :</p>
                                </div>
                                <div class="col-7">
                                    <p class="text-muted">{{$data->jawaban->created_at}}</p>
                                </div>
                            </div>
                            @if($data->jawaban->created_at > $data->deadline)
                                <div class="row">
                                    <div class="col-5">
                                        <p class="text-weight-bold">Status :</p>
                                    </div>
                                    <div class="col-7">
                                        <p class="text-danger">Terlambat</p>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-5">
                                        <p class="text-weight-bold">Status :</p>
                                    </div>
                                    <div class="col-7">
                                        <p class="text-success">Tepat Waktu</p>
                                    </div>
                                </div>
                            @endif
                            <p class="text-weight-bold mt-1">Jawaban Anda :</p>
                            <textarea class="form-control" readonly>{{$data->jawaban->jawaban}}</textarea>
                            @if(now() < $data->deadline)
                            <button id="batalJawab" class="btn btn-danger mt-2">Batalkan pengiriman</button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @endif
    </div>
</div>

@endsection
@section("script")
@if($data->tipe==1)
<script>
    $(document).ready(function(){
        if($(".materi p").length > 0){
            $(".ringkasan p").text($(".materi p:first").text());
            // add style align justify ringkasan p
            $(".ringkasan p").css("text-align","justify");

        }
        $("#readmore").click(function(){
            $(".ringkasan").addClass("d-none");
            $(".materi").removeClass("d-none");
            $(this).addClass("d-none");
        });

        const hapusJawaban = () =>{
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#deleteJawaban").submit();
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )

                    }
                })
        }

        $("#batalJawab").click(function(){
            hapusJawaban();
        });
    });
</script>
@else
<script>
    $(document).ready(function(){
        $(".ringkasan").addClass("d-none");
        $(".materi").removeClass("d-none");
        $("#readmore").addClass("d-none");
    });
</script>
@endif
@endsection
