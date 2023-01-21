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
            /* background-image: linear-gradient(40deg, #0db8ff 0%, #f332ff 100%); */
        }

        .btn {
            background-color: #0f7fd5;
            appearance: none;
            border: 1px solid rgba(27, 31, 35, .15);
            border-radius: 6px;
            box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
            box-sizing: border-box;
            color: #fff !important;
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

        .card {
            width: 65%;
            margin: auto;
            margin-top: 2%;
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, 0.125);
            border-radius: 4px;
            /* box-shadow: 0px 1px 3px 0px rgb(54 74 99 / 5%); */
        }

        @media only screen and (max-width: 576px) {
            .card-body {
                padding: 0.8rem!important;
            }

            .card {
                width: 98%;
            }

            p {
                font-size: 11pt;
            }
            h3{
                font-size: 13pt;
            }
        }

        .card-body {
            padding: 2.5rem;
        }

        p {
            font-size: 16px;
        }

        h3{
            font-size: 18px;
        }


        /* CSS */
        .button-3 {
            appearance: none;
            background-color: #2ea44f;
            border: 1px solid rgba(27, 31, 35, .15);
            border-radius: 6px;
            box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
            box-sizing: border-box;
            color: #fff !important;
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

        .card-body h3 {
            text-align: center;
            color: black;
            margin-bottom: 35px;
            margin-top: 10px;
        }

        .card-body p {
            text-align: justify;
            /* text-muted */
            color: #6c757d;
        }

        .img {
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
            <p><b>Halo Kak {{$nama}}</b>, semoga kamu dalam keadaan sehat!
                <br /><br />
                Terima kasih atas antusiasme kamu dalam mengikuti <b>IT CAMP X FOWTEDU UI/UX Mini Bootcamp</b>
                <br /><br />
                Dalam email ini kami ingin memberitahukan untuk link kelas pada hari ini,
                <br />
                <a class="btn" href="https://zoom.us/j/91747889981?pwd=VVlSdnVRRWxLQ3c4K0JUbHd0d1ZnQT09">Bergabung dengan Zoom</a>
                <br /><br />
                Atau dapat bergabung pada grup Whatsapp yang menjadi tempat koordinasi selama acara berlangsung. Atau bisa juga klik link berikut ini:
                <br />
                <a class="button-3" href="https://chat.whatsapp.com/Iexdh3rQoep3vMakY6dbNP">Bergabung dengan Whatsappp</a>
                <br /><br />
                Terima kasih atas antusiasme kamu, sampai berjumpa di Live Zoom.
                <br /><br />
                <b>Salam</b>,
                <br />
                IT Camp team
            </p>

</body>

</html>
