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
                Terima kasih atas antusiasme kamu dalam mengikuti IT CAMP X FOWTEDU UI/UX Mini Bootcamp
                <br /><br />
                Dalam email ini kami ingin menyatakan,
                <br /><br />
                Langkah selanjutnya adalah mohon untuk mengunjungi platform it camp lalu login ke akun kamu, dan di sana akan terdapat link grup WA yang menjadi tempat koordinasi selama acara berlangsung
                <br /><br />
                Terima kasih atas antusiasme kamu, sampai berjumpa di Live Zoom besok.
                <br /><br />
                Salam,
                <br />
                IT Camp team
            </p>

</body>

</html>
