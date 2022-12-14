<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="HIMATIFA X Fowtedu UI/UX Mini Bootcamp merupakan rangkaian mini bootcamp yang diadakan oleh Himpunan Mahasiswa Informatika Universitas Pembangunan Nasional Veteran Jawa Timur dengan tujuan untuk mengenalkan UI/UX dikalangan pelajar/mahasiswa/umum.">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('')}}/frontend/assets/images/resources/logo.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('')}}/frontend/assets/images/resources/logo.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('')}}/frontend/assets/images/resources/logo.png" />

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Login | ITCamp</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{url('')}}/peserta/assets/css/dashlite.css?ver=2.4.0">
    <link id="skin-default" rel="stylesheet" href="{{url('')}}/peserta/assets/css/theme.css?ver=2.4.0">
    <style>
        /* for phone */
        @media only screen and (max-width: 500px) {
            .modal-dialog{
                padding: 12px;
            }
        }
    </style>
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
                                <div class="brand-logo pb-2  text-center">
                                    <a href="{{url('')}}" class="logo-link">
                                        <img class="logo" src="{{url('icon.png')}}" alt="logo">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Login</h4>
                                        <div class="nk-block-des">
                                            <p>Masuk ke akun peserta ITCamp</p>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{route("peserta.signin")}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" id="default-01" name="email" placeholder="Masukan email anda">
                                        @error('email')
                                        <small class="text-danger mt-2">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                            <a class="link link-primary link-sm" href="{{route('peserta.forgot')}}">Lupa Password ?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Masukan password anda">
                                        </div>
                                        @error('password')
                                        <small class="text-danger mt-2">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Login</button>
                                    </div>
                                </form>
                                <div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                                </div>
                                <a href="{{route("socialite.auth",['provider'=>'google'])}}" class="btn btn-block btn-outline-danger"><em class="icon ni ni-google"></em><span>Daftar atau Login dengan Google</span> </a>
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
    <div class="modal fade" tabindex="-1" id="promoDewaWeb">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close bg-danger text-white rounded-circle" style="opacity: 1;top:-1rem;right:-1rem" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <a target="_blank" href="https://www.dewaweb.com">
                <img  src="{{url('')}}/promo.jpg" alt="" class="img-fluid">
                </a>
            </div>
        </div>
    </div>

    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{url('')}}/peserta/assets/js/bundle.js?ver=2.4.0"></script>
    <script src="{{url('')}}/peserta/assets/js/scripts.js?ver=2.4.0"></script>
    @if(session()->has('success'))
    <script>
        (function(NioApp, $) {
            'use strict';
            toastr.clear();
            NioApp.Toast('{{ session()->get('success') }}', 'success', {
                    position: 'top-right'
                });


        })(NioApp, jQuery);
    </script>
    @endif
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
    <script>
        $(document).ready(function() {
            $('#promoDewaWeb').modal('show');
        });
    </script>
</html>
