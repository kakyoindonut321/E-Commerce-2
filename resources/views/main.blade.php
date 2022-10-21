<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>nanti dinamain</title>

    {{-- BOOSTRAP DARI PROJECT SENDIRI --}}
    <link rel="stylesheet" href={{ URL::to('/css/bootstrap.css') }}>
    {{-- FONTAWESOME ONLINE KARENA GK BISA --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- BOOSTRAP JS JUGA SORRY --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    {{-- NAVBAR --}}
    <div class="container-fm p-2 bg-lime d-flex justify-space-between">
        {{-- LOGO WEBSITE DAN NAMA WEBSITE --}}
        <a href="#" class="navbar-brand me-auto">
            <img src="{{ URL::to('/image/KLMPK2 Shop logo green.png') }}" width="45" alt="" class="d-inline-block align-middle mr-2">
            <span class="text-uppercase font-weight-bold text-dark ">E-Commerce</span>
          </a>
          {{-- NAMA USER DAN LOGO --}}
          <a href="#" class="navbar-user">
            <span class="text-uppercase font-weight-bold text-dark navbar-user">Hannan</span>
            <img src="{{ URL::to('/image/user.png') }}" width="45" alt="" class="d-inline-block align-middle ">
          </a>
    </div>
    {{-- END NAVBAR --}}


    {{-- BODY DALEM --}}
    <div class="d-flex">
        {{-- SIDEBAR --}}
        <div class="d-flex flex-column flex-shrink-0 p-3" id="sidebar" style="width: 240px; height:900px">
            <div>
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none ">
                    <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                    <span class="fs-4">Content
                    </span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link link-dark " aria-current="page">
                            <i class="fa-solid fa-clipboard-list" ></i> Order
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link link-dark active">
                            <i class="fa-solid fa-cart-shopping"></i> Product Catalog
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link link-dark">
                            <i class="fa-solid fa-chart-simple"></i> Report
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <button onclick="Toggle()" class="toggle-btn"></button>
        {{-- END SIDEBAR --}}

        {{-- CONTENT --}}
        <div class="d-flex p-2 justify-content-center" style="flex-wrap: wrap;">
            @yield('content')
        </div>
        {{-- END CONTENT --}}

    </div>
    {{-- END BODY DALEM --}}
    <script src="{{ URL::to('/js/additional.js') }}"></script>
</body>
</html>