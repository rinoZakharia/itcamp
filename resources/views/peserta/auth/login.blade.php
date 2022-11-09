<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="HIMATIFA X Partnership UI/UX Mini Bootcamp merupakan rangkaian mini bootcamp yang diadakan oleh Himpunan Mahasiswa Informatika Universitas Pembangunan Nasional Veteran Jawa Timur dengan tujuan untuk mengenalkan UI/UX dikalangan pelajar/mahasiswa/umum.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Login | ITCamp</title>
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
                                <div class="brand-logo pb-2  text-center">
                                    <a href="html/index.html" class="logo-link">
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
                                            <a class="link link-primary link-sm" href="html/pages/auths/auth-reset-v2.html">Lupa Password ?</a>
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
                                <div class="form-note-s2 text-center pt-4"> Belum punya akun ? <a href="{{route("peserta.register")}}">Buat Akun</a>
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

</html>
