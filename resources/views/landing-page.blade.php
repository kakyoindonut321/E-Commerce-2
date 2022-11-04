<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ URL::to('/css/landing.css') }}>
    <style>
        body {
            background-image: url("{{ URL::to('/image/Ellipse 1.png') }}");
        }
    </style>
    <title>E-commerce</title>
</head>
<body>
    <nav>
        <div class="top-menu">
            <img class="logo" src="{{ URL::to('/image/KLMPK2 Shop logo green.png') }}" alt="Logo" >

            <ul class="navbar">
                <div class="start-now">
                    <li><a href="/product"><b>START NOW</b></a></li>
                </div>
                @if(!auth()->check())
                <div class="login">
                    <li><a href="/login"><b>LOGIN</b></a></li>
                </div>
                @endif
            </ul>
        </div>
    </nav>
    <div class="hero">
        <img src="{{ URL::to('/image/modem 1.png') }}" alt="modem" class="img-hero">
        
    </div>

    <div class="category">
        <h2>Product Category</h2>
        <div class="flexing">
        <div class="card">
            <img src="{{ URL::to('/image/placeholder.jpg') }}" alt="">
            <h4>bola ucl</h4>
        </div>
        <div class="card">
            <img src="{{ URL::to('/image/placeholder.jpg') }}" alt="">
            <h4>bola ucl</h4>
        </div>
        <div class="card">
            <img src="{{ URL::to('/image/placeholder.jpg') }}" alt="">
            <h4>bola ucl</h4>
        </div>
        <div class="card">
            <img src="{{ URL::to('/image/placeholder.jpg') }}" alt="">
            <h4>bola ucl</h4>
        </div>
        <div class="card">
            <img src="{{ URL::to('/image/placeholder.jpg') }}" alt="">
            <h4>bola ucl</h4>
        </div>
        </div>

    </div>


</body>
</html>