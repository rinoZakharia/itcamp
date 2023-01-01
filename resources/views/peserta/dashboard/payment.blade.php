@extends("peserta.layout")
@section("content")
<div class="nk-block">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-inner card-inner-lg">
                    <input type="text" class="d-none" id="rek" value="">
                    <!-- chose payment -->
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Pilih Metode Pembayaran</h4>
                            <div class="nk-block-des">
                                <p>Pilih salah satu metode pembayaran yang tersedia</p>
                            </div>
                        </div>
                    </div>
                    <div class="payment">
                        <img class="icon-pay mb-4 d-md-none" src="{{url('peserta/assets/images/dana.png')}}" alt="logo">
                    </div>
                    <div class="card-pay payment">
                        <div class="between-center flex-wrap g-3">
                            <div class="flex-wrap d-flex">
                                <img class="icon-pay d-none d-md-block" src="{{url('peserta/assets/images/dana.png')}}" alt="logo">
                                <div class="user-info">
                                    <span class="lead-text">BRI</span>
                                    <span class="sub-text d-md-none">0881026653711 A.N (Salma Fathiyatur)</span>
                                </div>
                            </div>
                            <div class="nk-block-actions flex-shrink-sm-0">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                    <li class="order-md-last">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalDefault"><em class="ni ni-exchange mr-1"></em> Ganti</button>
                                        <button type="button" id="btn-copy" class="btn btn-secondary" ><em class="ni ni-copy mr-1"></em> Salin</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Total -->
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <div class="nk-block-des">
                                <p>Total</p>
                            </div>
                            <h4 class="nk-block-title">Rp.50.000</h4>
                        </div>
                    </div>
                    <form enctype="multipart/form-data" method="POST" action="{{route("peserta.pay")}}">
                        @csrf
                        <input type="file" name="bukti_pembayaran" class="dropzone-file d-none">

                        <input type="hidden" name="bank">
                        <input type="hidden" name="email" value="{{session()->get('email.peserta')}}">
                        <label class="form-label mt-3 mb-2">Upload bukti pembayaran</label>
                        <div class="upload-zone" data-accepted-files="image/*">
                            <div class="dz-message" data-dz-message>
                                <span class="dz-message-text">Drag and drop file</span>
                                <span class="dz-message-or">or</span>
                                <button  type="button" class="btn btn-info"> <em class="ni ni-upload-cloud mr-1"></em> SELECT</button>
                            </div>

                        </div>
                        <button class="btn mt-1 btn-sm btn-danger dz-remove">Hapus Foto</button>
                        <!-- save button -->
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary btn-block"><em class="ni ni-save mr-1"></em> Simpan</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- only show in md -->
            <div class="card d-none d-md-block">
                <div class="card-inner card-inner-lg">
                    <!-- card list bank with logo availble to transfer -->
                    <div class="card-head">
                        <h5 class="card-title card-title-sm">Transfer</h5>
                    </div>
                    <div class="card-text transfer-card payment">
                        <div class="user-card">
                            <img class="icon-pay" src="{{url('peserta/assets/images/dana.png')}}" alt="logo">
                            <div class="user-info">
                                <span class="lead-text">BRI</span>
                                <span class="sub-text">123123123 A.N (Salma Fathiyatur)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section("modal")
<div class="modal fade" tabindex="-1" id="modalDefault">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Metode Pembayaran</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <div id="payment_list">

                </div>

            </div>
            <div class="modal-footer bg-light">
                <span class="sub-text">Pilih Metode Pembayaran</span>
            </div>
        </div>
    </div>
</div>
@endsection
@section("script")
<script>
    $(document).ready(function() {
        let akun = [
            {
                'bank' : 'BRI',
                'no_rek' : '6414 0102 3109 531',
                'rek':'641401023109531',
                'nama' : 'Salma Fathiyatur',
                'logo': "{{url('peserta/assets/images/bri.png')}}"
            },
            {
                'bank' : 'Mandiri',
                'no_rek' : '1710007429759',
                'rek' : '1710007429759',
                'nama' : 'Salma Fathiyatur',
                'logo': "{{url('peserta/assets/images/mandiri.png')}}"
            },
            {
                'bank' : 'DANA',
                'no_rek' : '+62-812-1784-1264',
                'rek' : '6281217841264',
                'nama' : 'Salma Fathiyatur',
                'logo': "{{url('peserta/assets/images/dana.png')}}"
            },
            {
                'bank' : 'OVO',
                'no_rek' : '+62-812-1784-1264',
                'rek' : '6281217841264',
                'nama' : 'Salma Fathiyatur',
                'logo': "{{url('peserta/assets/images/ovo.png')}}"
            },
            {
                'bank' : 'Shopee Pay',
                'no_rek' : '+62-812-1784-1264',
                'rek' : '6281217841264',
                'nama' : 'Salma Fathiyatur',
                'logo': "{{url('peserta/assets/images/shopee.png')}}"
            }
        ]
        var itemSelected;

        window.Clipboard = (function(window, document, navigator) {
                var textArea,
                    copy;

                function isOS() {
                    return navigator.userAgent.match(/ipad|iphone/i);
                }

                function createTextArea(text) {
                    textArea = document.createElement('textArea');
                    textArea.value = text;
                    document.body.appendChild(textArea);
                }

                function selectText() {
                    var range,
                        selection;

                    if (isOS()) {
                        range = document.createRange();
                        range.selectNodeContents(textArea);
                        selection = window.getSelection();
                        selection.removeAllRanges();
                        selection.addRange(range);
                        textArea.setSelectionRange(0, 999999);
                    } else {
                        textArea.select();
                    }
                }

                function copyToClipboard() {
                    document.execCommand('copy');
                    document.body.removeChild(textArea);
                }

                copy = function(text) {
                    createTextArea(text);
                    selectText();
                    copyToClipboard();
                };

                return {
                    copy: copy
                };
            })(window, document, navigator);
        function setCopy(){
            // copy to clipboard #rek
            var copyText = document.getElementById("rek");
            Clipboard.copy(copyText.value);
            toastr.clear();
            NioApp.Toast('Berhasil disalin', 'success', {position: 'bottom-center'});
        }
            function setAkun(){
            let itemFirst = akun[0]
            itemSelected = itemFirst
            $(".payment .icon-pay").attr("src",itemFirst.logo)
            $(".payment .lead-text").text(itemFirst.bank)
            $(".payment .sub-text").text(itemFirst.no_rek + " A.N " + itemFirst.nama)
            $("input[name=bank]").val(itemFirst.bank)
            $("#payment_list").html('')
            $("#rek").val(itemFirst.rek)
            akun.forEach(function(item, index){

                $("#payment_list").append(`
                    <div class="card-pay-list" data-item='${JSON.stringify(item)}'>
                        <div class="flex-wrap d-flex">
                            <img class="icon-pay" src="`+item.logo+`" alt="logo">
                            <div class="user-info">
                                <span class="lead-text">`+item.bank+`</span>
                            </div>
                        </div>
                    </div>
                `)
            })
            $(".card-pay-list").on("click",(e)=>{
                let data = $(e.currentTarget).data("item")
                $("#rek").val(data.rek)
                $(".payment .icon-pay").attr("src",data.logo)
                $(".payment .lead-text").text(data.bank)
                $(".payment .sub-text").text(data.no_rek + " A.N " + data.nama)
                $("input[name=bank]").val(data.bank)
                // close modal
                $("#modalDefault").modal("hide")
            })

            $("#btn-copy").on("click",()=>{
                setCopy()
            })
        }
        setAkun()


    });
</script>
@endsection
