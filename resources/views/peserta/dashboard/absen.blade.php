@extends("peserta.layout")
@section("content")
<div class="nk-block">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card mb-1">
                <p style="font-size: 1em;" class="text-center text-white bg-purple fw-bold py-1" id="now">
                    {{date('d-m-Y H:i:s')}}
                </p>
                <div class="card-inner card-inner-lg">
                    <!-- title task -->
                    <div class="nk-block">
                        <h4 class="nk-block-title">{{$data->judul}}</h4>
                        <p class="text-muted">Harap isi semua data absensi dengan benar</p>
                    </div>
                    <form enctype="multipart/form-data" method="POST" action="{{route("peserta.absen.post")}}" class="mt-4">
                        @csrf
                        <input type="hidden" name="absensi_id" value="{{$data->id}}" />
                        <input type="file" name="screenshoot" class="dropzone-file d-none">
                        <label class="form-label" for="default-06">Screenshot Acara <sup class="text-danger">*) Wajib Diisi</sup></label>
                        <div class="upload-zone" data-max-file-size="1" data-accepted-files="image/*">
                            <div class="dz-message" data-dz-message>
                                <span class="dz-message-text">Drag and drop file</span>
                                <span class="dz-message-or">or</span>
                                <button type="button" class="btn btn-info"> <em class="ni ni-upload-cloud mr-1"></em> SELECT</button>
                            </div>
                        </div>
                        <small class="d-block"><span class="text-danger">*)</span>Harap upload gambar maksimal 1 MB</small>
                        <button type="button" class="btn mt-1 btn-sm btn-danger dz-remove">Hapus Foto</button>
                        <!-- text area review -->
                        <div class="form-group mt-2">
                            <label class="form-label" for="default-06">Review Singkat <sup class="text-danger">*) Wajib Diisi</sup></label>
                            <div class="form-control-wrap">
                                <textarea name="review" class="form-control form-control-sm" id="default-06" placeholder="Masukan review"></textarea>
                            </div>
                        </div>
                        <!-- text area kesan pesan -->
                        <div class="form-group mt-2">
                            <label class="form-label" for="default-06">Kesan & Pesan</label>
                            <div class="form-control-wrap">
                                <textarea name="kesan" class="form-control form-control-sm" id="default-06" placeholder="Masukan kesan pesan"></textarea>
                            </div>
                        </div>

                        <input type="submit" disabled value="Absen" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section("script")
<script>
    $(document).ready(function() {
        // #now timer now
        const setDateTime = () => {
            let now = new Date();
            // add 0 in day
            let day = now.getDate();
            if (day < 10) {
                day = "0" + day;
            }

            // add 0 in month
            let month = now.getMonth() + 1;
            if (month < 10) {
                month = "0" + month;
            }
            let date = day + "-" + month + "-" + now.getFullYear();
            let hours = now.getHours();
            if (hours < 10) {
                hours = "0" + hours;
            }
            let minutes = now.getMinutes();
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            let seconds = now.getSeconds();
            if (seconds < 10) {
                seconds = "0" + seconds;
            }
            let time = hours + ":" + minutes + ":" + seconds;
            $("#now").html(date + " " + time);
        }
        setDateTime()
        // looping
        setInterval(function() {
            setDateTime()
        }, 1000);


        $("input[name='screenshoot'],textarea[name='review']").on("change", function() {
            cekForm()
        })


        const cekForm = () => {
            const files = $("input[name='screenshoot']").val()
            const review = $("textarea[name='review']").val().trim()
            if (files == "" || review == "") {
                $("input[type='submit']").attr("disabled", "true")
            } else {
                $("input[type='submit']").removeAttr("disabled")
            }
        }

        cekForm()
    });
</script>
@endsection
