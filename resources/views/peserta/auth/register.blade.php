<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="HIMATIFA X Fowtedu UI/UX Mini Bootcamp merupakan rangkaian mini bootcamp yang diadakan oleh Himpunan Mahasiswa Informatika Universitas Pembangunan Nasional Veteran Jawa Timur dengan tujuan untuk mengenalkan UI/UX dikalangan pelajar/mahasiswa/umum.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Register | ITCamp</title>
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
                    <div class="nk-block nk-block-middle nk-auth-body wide-xs">
                        <div class="card">
                            <div class="card-inner card-inner-lg">
                                <div class="brand-logo pb-2 text-center">
                                    <a href="{{url('')}}" class="logo-link">
                                        <img class="logo" src="{{url('icon.png')}}" alt="logo">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Daftar Akun</h4>
                                        <div class="nk-block-des">
                                            <p>Buat akun peserta ITCamp</p>
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('peserta.signup') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="nama">Nama</label>
                                        <input type="text" value="{{$name}}" class="form-control form-control-lg" id="nama" name="nama" placeholder="Masukkan Nama">
                                        <!-- error -->
                                        @error('nama')
                                        <small class="text-danger mt-2">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="text" value="{{$email}}" readonly class="form-control form-control-lg" id="email" name="email" placeholder="Masukkan Email">
                                        @error('email')
                                        <small class="text-danger mt-2">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Masukkan Password">
                                        </div>
                                        @error('password')
                                        <small class="text-danger mt-2">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Daftar</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4"> Sudah punya akun ? <a href="{{route("peserta.login")}}"><strong>Masuk disini</strong></a>
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
