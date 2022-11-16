    {{-- NAVBAR --}}
    <div class="container-fm p-2 bg-lime d-flex justify-space-between">
          {{-- LOGO WEBSITE DAN NAMA WEBSITE --}}
          <div onclick="Toggle()"  class="navbar-box nav-box navbutton">
            <i  class="bx bx-menu outer-i d-inline  " style=""></i>
          </div>
          <a href="/" class="navbar-brand me-auto">
            <img src="{{ URL::to('/image/KLMPK2 Shop logo green.png') }}" width="45" alt="" class="d-inline-block align-middle mr-2 text-lime">
            <span class="text-uppercase font-weight-bold text-light font-poppin title-nav">E-Commerce</span>
          </a>

          <form action="{{ route('search') }}" class="navsearch me-auto my-auto">
            <input type="search" class="search-data" placeholder="Search" name="search" value="{{ request('search') }}">
            <button type="submit" class="fas fa-search"></button>
         </form>

         <a class="navbar-box nav-box me-auto my-auto search-two-btn" style="text-decoration: none;">
          <i class="fas fa-search right-i d-inline" onclick="navToggle()"></i>
         </a>

          <a href="/product" class="navbar-box nav-box home-nav" style="text-decoration: none;">
            <i class="fa-solid fa-house right-i d-inline"></i>
            {{-- <span class="navdesc">Listing</span> --}}
          </a>
          @if (Auth::check())
          <a href="/order" class="navbar-box nav-box mw-auto" style="text-decoration: none;">
            @if (isset($orderCount) && $orderCount > 0)
              <p class="d-inline pp">@if(strlen($orderCount)> 2) {{ substr( $orderCount, 0,2) . '..' }} @else {{ $orderCount }} @endif</p>
            @endif
            <i  class="fa-solid fa-cart-shopping right-i d-inline"></i>
          </a>              
          @else
          <a href="/order" class="navbar-box nav-box mw-auto" style="text-decoration: none;">
            <i  class="fa-solid fa-cart-shopping right-i d-inline"></i>
          </a>     
          @endif

          {{-- NAMA USER DAN LOGO --}}
          @if(Auth::check())
          <a href="/user/{{ auth()->user()->id }}" class="navbar-user m-0">
            <span class="text-uppercase font-weight-bold text-dark navbar-user">{{ auth()->user()->name }}</span>
            <img src="@avatar(auth()->user()->profile_image)" alt="" class="d-inline-block align-middle" style="border: 2px solid #66b346;border-radius: 50%; width: 45px; height: 45px;">
          </a>
          @else
          <a href="/login" class="navbar-user m-0">
            <span class="text-uppercase font-weight-bold navbar-user text-primary font-kita">LOGIN NOW</span>
            <img src="{{ URL::to('/image/user.png') }}" width="45" alt="" class="d-inline-block align-middle " style="border: 2px solid #66b346;border-radius: 50%; width: 45px; height: 45px;">
          </a>
          @endif

    </div>
    {{-- END NAVBAR --}}
    
    <div class="container-fm p-2 bg-lime d-flex justify-space-between search-nav-pos">
      <a href="/product" class="navbar-box nav-box mw-auto" style="text-decoration: none;">
        <i class="fa-solid fa-house right-i d-inline text-light down-side"></i>
      </a>
      <form action="{{ route('search') }}" class="navsearchdown me-auto my-auto">
        <input type="search" class="search-data" placeholder="Search" name="search" value="{{ request('search') }}">
        <button type="submit" class="fas fa-search"></button>
     </form>
    </div>