        {{-- SIDEBAR --}}
        <div class="dim" id="btn">

        </div>
        <div class="sidebar-sb">
        <div class="border-sb">
            <div class="logo-details">
                <img src="{{ URL::to('/image/KLMPK2 Shop logo green.png') }}" alt="" style="padding-right: 7px;" width="55px" class='bx bxl-c-plus-plus icon'>
                <div class="logo_name">Commerce</div>
                <i class='bx bx-menu' id="btn" onclick="Toggle()"></i>
            </div>
            <ul class="nav-list-sb">
                <li>
                    <a href="/product">
                        <i class='bx bx-grid-alt'></i>
                        <span class="links_name-sb">Product</span>
                    </a>
                    {{-- <span class="tooltip-sb">Product</span> --}}
                </li>
                <li>
                    <a href="/order">
                        <i class='bx bx-cart-alt'></i>
                        <span class="links_name-sb">Order</span>
                    </a>
                    {{-- <span class="tooltip-sb">Order</span> --}}
                </li>
                @auth
                @if (auth()->user()->privilege == "admin")
                <li>
                    <a href="/report">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <span class="links_name-sb">Report</span>
                    </a>
                    {{-- <span class="tooltip-sb">Report</span> --}}
                </li>
                @endif
                @endauth
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