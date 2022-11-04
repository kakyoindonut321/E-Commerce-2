<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ URL::to('/css/landing.css') }}>
    <style>
        .bgland {
            background-image: url("{{ URL::to('/image/landing-page.png') }}");
        }
    </style>
    <title>E-commerce</title>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="{{ URL::to('/image/KLMPK2 Shop logo green.png') }}" width="45" alt="" class=".menu-icon align-middle mr-2 text-lime">
         </div>
         <form action="#">
            <input type="search" class="search-data" placeholder="Search" required>
            <button type="submit" class="fas fa-search">🔍</button>
         </form>
         <ul class="navbar">
                <div class="start-now">
                    <li><a href="/product"><b>START NOW</b></a></li>
                </div>
                <div class="login">
                    <li><a href="/login"><b>LOGIN</b></a></li>
                </div>
            </ul>

      </nav>

    <!-- <div class="bgland">
        &Snbsp;
    </div> -->

    <div class="category">
        <h2>Product Category</h2>
        <div class="flexing">
            <div class="card">
                <img src="{{ URL::to('/image/placeholder.jpg') }}" alt="">
                <h4>category</h4>
            </div>
            <div class="card">
                <img src="{{ URL::to('/image/placeholder.jpg') }}" alt="">
                <h4>category</h4>
            </div>
            <div class="card">
                <img src="{{ URL::to('/image/placeholder.jpg') }}" alt="">
                <h4>category</h4>
            </div>
            <div class="card">
                <img src="{{ URL::to('/image/placeholder.jpg') }}" alt="">
                <h4>category</h4>
            </div>
            <div class="card">
                <img src="{{ URL::to('/image/placeholder.jpg') }}" alt="">
                <h4>category</h4>
            </div>
        </div>

    </div>

     


</body>
</html>