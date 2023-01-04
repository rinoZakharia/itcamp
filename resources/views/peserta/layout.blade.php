<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="HIMATIFA">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="HIMATIFA X Partnership UI/UX Mini Bootcamp merupakan rangkaian mini bootcamp yang diadakan oleh Himpunan Mahasiswa Informatika Universitas Pembangunan Nasional Veteran Jawa Timur dengan tujuan untuk mengenalkan UI/UX dikalangan pelajar/mahasiswa/umum.">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('')}}/frontend/assets/images/resources/logo.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('')}}/frontend/assets/images/resources/logo.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('')}}/frontend/assets/images/resources/logo.png" />

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{url('')}}/frontend/assets/images/resources/logo.png">
    <!-- Page Title  -->
    <title>{{$title}} | ITCamp</title>
    <link rel="stylesheet" href="{{url('')}}/peserta/assets/css/dashlite.min.css?ver=2.4.0">
    <link id="skin-default" rel="stylesheet" href="{{url('')}}/peserta/assets/css/theme.css?ver=2.4.0">
</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="{{url('')}}" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{url('icon.png')}}" alt="logo">
                            <img class="logo-dark logo-img" src="{{url('icon.png')}}" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="{{url('icon.png')}}" alt="logo-small">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Dashboards</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="{{route('peserta.account')}}" class="nk-menu-link">
                                        <!-- account icon-->
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                        <span class="nk-menu-text">Akun</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{route('peserta.payment')}}" class="nk-menu-link">
                                        <!-- Payment -->
                                        <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
                                        <span class="nk-menu-text">Pembayaraan</span>
                                    </a>
                                </li>
                                <!-- Informasi Peserta -->
                                @if(session()->get('check.peserta'))
                                <li class="nk-menu-item">
                                    <a href="{{route('peserta.information')}}" class="nk-menu-link">
                                        <!-- account icon-->
                                        <span class="nk-menu-icon"><em class="icon ni ni-user-fill"></em></span>
                                        <span class="nk-menu-text">Informasi Peserta</span>
                                    </a>
                                </li>
                                @if(false)
                                <li class="nk-menu-item">
                                    <a href="{{route('peserta.listtask')}}" class="nk-menu-link">
                                        <!-- account icon-->
                                        <span class="nk-menu-icon"><em class="icon ni ni-book"></em></span>
                                        <span class="nk-menu-text">Materi dan Tugas</span>
                                    </a>
                                </li>
                                @endif
                                @endif
                                @if(session()->get('sertifikat.peserta') && false)
                                <li class="nk-menu-item">
                                    <a href="{{route('peserta.sertifikat')}}" class="nk-menu-link">
                                        <!-- account icon-->
                                        <span class="nk-menu-icon"><em class="icon ni ni-file"></em></span>
                                        <span class="nk-menu-text">Sertifikat</span>
                                    </a>
                                </li>
                                @endif
                                    <!-- signout -->
                                <li class="nk-menu-item">
                                    <a href="{{route("peserta.logout")}}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
                                        <span class="nk-menu-text">Keluar</span>
                                    </a>
                                </li>
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="{{url('')}}" class="logo-link">
                                    <img class="logo-light logo-img" src="{{url('icon.png')}}" alt="logo">
                                    <img class="logo-dark logo-img" src="{{url('icon.png')}}" alt="logo-dark">
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown notification-dropdown">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div id="icon-notif"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">

                                                </div><!-- .nk-notification -->
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>

                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    @yield("modal")
    <script src="{{url('')}}/peserta/assets/js/bundle.js?ver=2.4.0"></script>
    <script src="{{url('')}}/peserta/assets/js/scripts.js?ver=2.4.0"></script>
    @yield("script")
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
    <script>
        (function(NioApp, $) {
            'use strict';
            // fetch notification

            function fetchNotification() {
                $.ajax({
                    url: "{{url('api/notification')}}?email={{session()->get('email.peserta')}}",
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        $(".nk-notification").html("");
                        let messageNotRead=false;
                        response.data.forEach(element => {
                            // check if read
                            if(!element.is_read){
                                messageNotRead=true;
                            }
                            // diff created notification without library
                            const date1 = new Date(element.created_at);
                            const date2 = new Date();
                            const diffTime = Math.abs(date2 - date1);
                            const diffDays = Math.round(diffTime / (1000 * 60 * 60 * 24));
                            const diffHours = Math.round(diffTime / (1000 * 60 * 60));
                            const diffMinutes = Math.round(diffTime / (1000 * 60));
                            let diff = "";
                            if (diffDays > 0) {
                                diff = diffDays + " hari yang lalu";
                            } else if (diffHours > 0) {
                                diff = diffHours + " jam yang lalu";
                            } else if (diffMinutes > 0) {
                                diff = diffMinutes + " menit yang lalu";
                            } else {
                                diff = "Baru saja";

                            }

                            let bg = element.is_read == 1 ? "bg-success-dim" : "bg-warning-dim";

                            let item =`<div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle ${bg} ni ni-bell"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">${element.notification}</div>
                                                            <div class="nk-notification-time">${diff}</div>
                                                        </div>
                                                    </div>`;
                                                    $(".nk-notification").append(item);
                                                });

                            if(messageNotRead){
                                $("#icon-notif").addClass("icon-status icon-status-info");
                                $('.notification-dropdown').on('show.bs.dropdown', function () {
                                        if($("#icon-notif").hasClass("icon-status-info")){
                                            $("#icon-notif").removeClass("icon-status-info");
                                            $("#icon-notif").removeClass("icon-status");

                                            // make all notification read
                                            $.ajax({
                                                url: "{{url('api/read_notif')}}?email={{session()->get('email.peserta')}}",
                                                type: "GET",
                                                success: function(response) {

                                                }
                                            });
                                        }else{
                                            $(".nk-notification-icon .ni-bell").removeClass("bg-warning-dim");
                                            $(".nk-notification-icon .ni-bell").addClass("bg-success-dim");
                                        }
                                });
                            }
                            }


                        });
            }
            fetchNotification();
        })(NioApp, jQuery);
    </script>

</body>

</html>
