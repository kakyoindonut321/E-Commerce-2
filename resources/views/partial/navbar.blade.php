    {{-- NAVBAR --}}
    <div class="container-fm p-2 bg-lime d-flex justify-space-between">
          {{-- LOGO WEBSITE DAN NAMA WEBSITE --}}
          <div onclick="Toggle()"  class="navbar-box nav-box navbutton">
            <i  class="bx bx-menu outer-i d-inline  " style=""></i>
          </div>
          <a href="/" class="navbar-brand me-auto">
            <img src="{{ URL::to('/image/KLMPK2 Shop logo green.png') }}" width="45" alt="" class="d-inline-block align-middle mr-2 text-lime">
            <span class="text-uppercase text-light open-sauce-one-bold title-nav">Taufikgantengstore</span>
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

          @auth
            @if (auth()->user()->privilege == "admin")
              <a href="/user-order" class="navbar-box nav-box mw-auto" style="text-decoration: none;">
                <i class="fa-solid fa-list-check right-i d-inline"></i>
              </a>  
            @endif
          @endauth

          @if (Auth::check())
            @unless (auth()->user()->privilege == "admin")
              <a href="/cart" class="navbar-box nav-box mw-auto" style="text-decoration: none;">
                @if (isset($cartCount) && $cartCount > 0)
                  <p class="d-inline pp">@if(strlen($cartCount)> 2) {{ substr( $cartCount, 0,2) . '..' }} @else {{ $cartCount }} @endif</p>
                @endif
                <i  class="fa-solid fa-cart-shopping right-i d-inline"></i>
              </a>     
              {{-- 
              <a href="/cart" class="navbar-box nav-box mw-auto" style="text-decoration: none;">
                <i  class="fa-solid fa-cart-shopping right-i d-inline"></i>
              </a>      --}}
            @endunless
          @endif

          {{-- NAMA USER DAN LOGO --}}
          @auth
          <a href="/user/{{ auth()->user()->id }}" class="navbar-user m-0">
            <span class="text-uppercase font-weight-bold text-dark navbar-user">@if(strlen(auth()->user()->name)> 8) {{ substr( auth()->user()->name, 0,8) . '-' }} @else {{ auth()->user()->name }} @endif</span>
            <img src="@avatar(auth()->user()->profile_image)" alt="" class="d-inline-block align-middle" style="border: 2px solid #66b346;border-radius: 50%; width: 45px; height: 45px;">
          </a>
          @else
          <a href="/login" class="navbar-user m-0">
            <span class="text-uppercase font-weight-bold navbar-user text-primary font-kita">LOGIN NOW</span>
            <img src="{{ URL::to('/image/user.png') }}" width="45" alt="" class="d-inline-block align-middle " style="border: 2px solid #66b346;border-radius: 50%; width: 45px; height: 45px;">
          </a>
          @endauth

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