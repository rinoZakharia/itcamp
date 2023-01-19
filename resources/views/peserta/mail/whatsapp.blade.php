<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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



        /* CSS */
        .button-3 {
            appearance: none;
            background-color: #2ea44f;
            border: 1px solid rgba(27, 31, 35, .15);
            border-radius: 6px;
            box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-family: -apple-system, system-ui, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 12px;
            font-weight: 600;
            line-height: 20px;
            padding: 6px 16px;
            margin-top: 15px;
            position: relative;
            text-align: center;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: middle;
            white-space: nowrap;
        }

        .button-3:focus:not(:focus-visible):not(.focus-visible) {
            box-shadow: none;
            outline: none;
        }

        .button-3:hover {
            background-color: #2c974b;
        }

        .button-3:focus {
            box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
            outline: none;
        }

        .button-3:disabled {
            background-color: #94d3a2;
            border-color: rgba(27, 31, 35, .1);
            color: rgba(255, 255, 255, .8);
            cursor: default;
        }

        .button-3:active {
            background-color: #298e46;
            box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
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
                Terima kasih atas antusiasme kamu dalam mengikuti <b>IT CAMP X FOWTEDU UI/UX Mini Bootcamp</b>
                <br /><br />
                Dalam email ini kami ingin menyatakan,
                <br /><br />
                Langkah selanjutnya adalah mohon untuk mengunjungi platform IT Camp lalu login ke akun kamu, dan di sana akan terdapat link grup WA yang menjadi tempat koordinasi selama acara berlangsung. Atau bisa juga klik link berikut ini:
                <br />
                <a class="button-3" href="https://chat.whatsapp.com/Iexdh3rQoep3vMakY6dbNP">Bergabung dengan Whatsappp</a>
                <br /><br />
                Terima kasih atas antusiasme kamu, sampai berjumpa di Live Zoom besok.
                <br /><br />
                <b>Salam</b>,
                <br />
                IT Camp team
            </p>

</body>

</html>
