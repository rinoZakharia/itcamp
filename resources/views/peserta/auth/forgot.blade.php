<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Reset | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{url('')}}/peserta/assets/css/dashlite.css?ver=2.4.0">
    <link id="skin-default" rel="stylesheet" href="{{url('')}}/peserta/assets/css/theme.css?ver=2.4.0">
</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main " id="auth-nk">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">

                        <div class="card">
                            <div class="card-inner card-inner-lg">
                                <div class="brand-logo pb-4 text-center">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img logo-img-lg"  src="{{url('icon.png')}}" alt="logo">
                                    <img class="logo-dark logo-img logo-img-lg"  src="{{url('icon.png')}}" alt="logo-dark">
                                </a>
                            </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Reset password</h5>
                                        <div class="nk-block-des">
                                            <p>Jika kamu lupa dengan passwordmu kami akan mengirim link ke emailmu untuk meresetnya.</p>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{route('peserta.forgot.post')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                        </div>
                                        <input type="text" name="email" class="form-control form-control-lg" id="default-01" placeholder="Masukan Email Anda">
                                        @error('email')
                                        <small class="text-danger mt-2">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Kirim</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4">
                                    <a href="{{route('peserta.login')}}"><strong>Kembali ke halaman login</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{url('')}}/peserta/assets/js/bundle.js?ver=2.4.0"></script>
    <script src="{{url('')}}/peserta/assets/js/scripts.js?ver=2.4.0"></script>
    @if(session()->has('error'))
    <script>
        (function(NioApp, $) {
            'use strict';
            toastr.clear();
            NioApp.Toast('{{ session()->get('error') }}', 'error', {
                    position: 'top-right'
                });
        })(NioApp, jQuery);
    </script>
    @endif
</html>
