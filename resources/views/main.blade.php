<!DOCTYPE html>
<html lang="en">
<head>

    {{-- 
        MESSAGE dari kami kelompok 2:
        hallo, ini bang misalkan bingung, begini struktur dan cara bacanya!
        
        cara baca:
        {{- NAMA BAGIAN -}}
        <isi>bagian</contoh>
        {{- END NAMA BAGIAN -}}
        *kecuali bagian untuk link kyk boostrap



        STRUKTUR:
        -head:
        |-title
        |-link boostrap dll
        -/head

        -body:
        |-navbar
        |-body dalem:
        ||-sidebar
        ||-content:
        |||-carousel slide
        |||-listing produk
        ||-/content
        |-/body dalem
        |-
    --}}

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
            <span class="text-uppercase font-weight-bold text-dark navbar-user">Nama User</span>
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
        {{-- END SIDEBAR --}}

        {{-- CONTENT --}}
        <button onclick="Toggle()" class="toggle-btn"><div class="vr-line1"><div class="vr-line2"><div class="vr-line3"></div></div></button>
        <div class="d-flex p-2 justify-content-center" style="flex-wrap: wrap;">
          
          {{-- SLIDE CAROUSEL --}}
          <div id="slider" class="carousel slide border mx-5 w-75" data-bs-ride="carousel">
            <div class="carousel-inner ">
                <div class="carousel-item bg-dark active">
                    <img src="{{ URL::to('/image/iklan/iklan.png') }}" class="d-block w-100" alt="1">
                </div>
                <div class="carousel-item bg-dark">
                    <img src="{{ URL::to('/image/iklan/iklan2.png') }}" class="d-block w-100" alt="2">
                </div>
                <div class="carousel-item bg-dark">
                    <img src="{{ URL::to('/image/iklan/iklan3.png') }}" class="d-block w-100" alt="3">
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                  </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
            </div>
          </div>
          {{-- END CAROUSEL--}}

          {{-- LISTING PRODUK --}}
            @yield('content')
          {{-- END PRODUK --}}
        </div>
        {{-- END CONTENT --}}

    </div>
    {{-- END BODY DALEM --}}
    <script src="{{ URL::to('/js/additional.js') }}"></script>
</body>
</html>