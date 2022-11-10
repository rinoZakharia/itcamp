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
        body{
            font-family: 'Krub', sans-serif;
        }
        .btn {
            background-color: #0f7fd5; /* Green */
            border: none;
            color: white!important;
            padding: 9px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-bottom: 30px;
            color: #fff;
        }
        .card{
            width: 50%;
            margin: auto;
            margin-top: 10%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .card-body{
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
    <h3>Reset Password</h3>
    <p>Hi, {{$nama}}</p>
    <p>Untuk mereset password kamu, silahkan klik tombol dibawah ini.</p>
    <a href="{{$url}}" class="btn">Reset Password</a>

</body>
</html>

