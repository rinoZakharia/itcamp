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
            <div class="nk-block-head">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Pemberitahuan</h4>
                        <div class="nk-block-des">
                            <p>Informasi terkait acara :</p>
                        </div>
                    </div>
                </div>
            </div><!-- .nk-block-head -->

            <div class="nk-block message_event p-2">
                {!! $data->value !!}
                <!-- parse as html -->
            </div>
        </div>
    </div>
</div>
@endsection
