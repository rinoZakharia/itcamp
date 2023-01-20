<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberitahuan</title>
    <!-- font kubik -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Krub', sans-serif;
        }

        .btn {
            background-color: #0f7fd5;
            /* Green */
            border: none;
            color: white !important;
            padding: 9px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-bottom: 30px;
            color: #fff;
        }

        a .btn{
            text-decoration: none;
            color: white!important;
        }

        .card {
            width: 85%;
            margin: auto;
            margin-top: 2%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .card-body {
            padding: 10px;
        }
        .card-body h3{
            text-align: center;
            color: black;
            margin-bottom: 25px;
            margin-top: 10px;
        }
        .card-body p{
            text-align: justify;
            /* text-muted */
            color: #6c757d;
        }
        .img{
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <!-- card -->
    <div class="card">
        <div class="card-body">

            <div style="text-align: center;">
                <img src="{{url('icon.png')}}" alt="logo" width="100px">
            </div>
            <h3>Pemberitahuan</h3>
            <p>Halo Kak {{$nama}}, semoga kamu dalam keadaan sehat!
                <br /><br />
                Jangan sia-siakan kesempatan emas ini untuk meningkatkan skill UI/UX kamu dan berkembang di IT-CAMP X FOWTEDU 2023 UI/UX Mini Bootcamp. Segera lanjutkan pendaftaranmu sekarang sebelum pendaftaran ditutup dan ketinggalan dari kesempatan yang menguntungkan ini.
                <br /><br />
                <a href="{{url('https://itcamp2023.com/payment')}}" class="btn">Lanjutkan Pendaftaran</a>
                <br /><br />
                <b>Salam</b>,
                <br />
                IT Camp team
            </p>

</body>

</html>
