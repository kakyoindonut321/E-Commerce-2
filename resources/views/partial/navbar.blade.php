    {{-- NAVBAR --}}
    <div class="container-fm p-2 bg-lime d-flex justify-space-between">
          {{-- LOGO WEBSITE DAN NAMA WEBSITE --}}
          <div onclick="Toggle()"  class="navbar-box nav-box ">
            <i  class="bx bx-menu outer-i d-inline  " style=""></i>
          </div>
          <a href="/" class="navbar-brand me-auto">
            <img src="{{ URL::to('/image/KLMPK2 Shop logo green.png') }}" width="45" alt="" class="d-inline-block align-middle mr-2">
            <span class="text-uppercase font-weight-bold text-dark ">E-Commerce</span>
          </a>
          {{-- NAMA USER DAN LOGO --}}
          @if(Auth::check())
          <a href="#" class="navbar-user">
            <span class="text-uppercase font-weight-bold text-dark navbar-user">{{ auth()->user()->name }}</span>
            <img src="{{ URL::to('/image/user.png') }}" width="45" alt="" class="d-inline-block align-middle ">
          </a>
          @else
          <a href="/login" class="navbar-user">
            <span class="text-uppercase font-weight-bold navbar-user text-primary">LOGIN NOW</span>
            <img src="{{ URL::to('/image/user.png') }}" width="45" alt="" class="d-inline-block align-middle ">
          </a>
          @endif

    </div>
    {{-- END NAVBAR --}}