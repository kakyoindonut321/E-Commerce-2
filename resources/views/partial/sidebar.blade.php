        {{-- SIDEBAR --}}
        <div class="dim" id="btn">

        </div>
        <div class="sidebar-sb">
        <div class="border-sb">
            <div class="logo-details">
                <img src="{{ URL::to('/image/KLMPK2 Shop logo green.png') }}" alt="" style="padding-right: 7px;" width="55px" class='bx bxl-c-plus-plus icon'>
                <div class="logo_name open-sauce-one-bold">Green Bay</div>
                <i class='bx bx-menu' id="btn" onclick="Toggle()"></i>
            </div>
            <ul class="nav-list-sb">
                <li>
                    <a href="/product">
                        <i class='bx bx-grid-alt fa-rotate-by'></i>
                        <span class="links_name-sb">Product</span>
                    </a>
                    {{-- <span class="tooltip-sb">Product</span> --}}
                </li>
                <li>
                    @auth
                        @if (auth()->user()->privilege == "admin")
                            <a href="/user-order">
                                <i class="fa-solid fa-list-check fa-rotate-by"></i>
                                <span class="links_name-sb">User Order</span>
                            </a>
                        @else
                        <a href="/cart">
                            <i class='bx bx-cart-alt fa-rotate-by'></i>
                            <span class="links_name-sb">Cart</span>
                        </a>
                    @endauth
                        @else
                            <a href="/cart">
                                <i class='bx bx-cart-alt fa-rotate-by'></i>
                                <span class="links_name-sb">Cart</span>
                            </a>
                        @endif  

                </li>
                <li>

                    @auth
                    @if (auth()->user()->privilege == "admin")
                    <a href="/user-history">
                        <i class="fa-solid fa-clock-rotate-left fa-rotate-by"></i>
                        <span class="links_name-sb">User History</span>
                    </a>
                    @else
                    <a href="/history">
                        <i class="fa-solid fa-clock-rotate-left fa-rotate-by"></i>
                        <span class="links_name-sb">History</span>
                    </a>
                    @endauth
                    @else
                    <a href="/history">
                        <i class="fa-solid fa-clock-rotate-left fa-rotate-by"></i>
                        <span class="links_name-sb">History</span>
                    </a>
                    @endif  
                    {{-- <span class="tooltip-sb">Product</span> --}}
                </li>

                @auth
                    @if (auth()->user()->privilege == "admin")
                        <li>
                            <a href="/report">
                                <i class='bx bx-pie-chart-alt-2 fa-rotate-by'></i>
                                <span class="links_name-sb">Report</span>
                            </a>
                            {{-- <span class="tooltip-sb">Report</span> --}}
                        </li>
                    @endif
                @endauth

                <li>
                    <a href="/about">
                        <i class="fa-solid fa-circle-info fa-rotate-by"></i>
                        <span class="links_name-sb">About Us</span>
                    </a>
                    {{-- <span class="tooltip-sb">About</span> --}}
                </li>
                
                @auth   
                <li class="profile">
                    <a href="/logout" class="a-profile">
                        <div>LOGOUT<i class='bx bx-log-out' id="log_out" ></i></div>
                    </a>
                </li>       
                @endauth
            </ul>
        </div>

    </div>
        {{-- END SIDEBAR --}}