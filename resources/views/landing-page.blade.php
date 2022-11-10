<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ URL::to('/css/landing.css') }}>
    <link rel="icon" href="{{ URL::to('/image/icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <style>
        .bgland {
            background-image: url("{{ URL::to('/image/landing-page.png') }}");
        }
    </style> --}}
    <title>E-commerce</title>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="{{ URL::to('/image/KLMPK2 Shop logo green.png') }}" width="45" alt="" class=".menu-icon align-middle mr-2 text-lime">
         </div>
         <form action="{{ route('search') }}">
            <input type="search" class="search-data" placeholder="Search" name="search" value="{{ request('search') }}">
            <button type="submit" class="fas fa-search"></button>
         </form>
         <ul class="navbar">
                <div class="start-now">
                    <li><a href="/product"><b>START NOW</b></a></li>
                </div>
                @if (!auth()->check())
                <div class="login">
                    <li><a href="/login"><b>LOGIN</b></a></li>
                </div>      
                @endif
            </ul>

      </nav>

    <div class="" >
        <img style="width:100%" src="{{ URL::to('/image/landing-page.png') }}" alt="">
    </div>

    <div class="category">
        <h2>Product Category</h2>
        <div class="flexing">
            @foreach($category as $cat)
            <div class="card">
                <img src="{{ URL::to('/image/placeholder.jpg') }}" alt="">
                <h4>{{ $cat->category }}</h4>
            </div>
            @endforeach
        </div>

    </div>

     


</body>
</html>