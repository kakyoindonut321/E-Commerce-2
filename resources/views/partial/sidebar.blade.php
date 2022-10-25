        {{-- SIDEBAR --}}
        <div class="d-flex flex-column flex-shrink-0 p-3" id="sidebar" style="width: 240px; height: 100vh;">
            <div>
                <a href="/" class=" d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none justify-content-center">
                    <span class="fs-4">Content
                    </span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="/order" class="nav-link link-dark @if($title == "Order") active @endif" aria-current="page">
                            <i class="fa-solid fa-clipboard-list" ></i> Order
                        </a>
                    </li>
                    <li>
                        <a href="/product" class="nav-link link-dark @if($title == "Products") active @endif">
                            <i class="fa-solid fa-cart-shopping"></i> Product Catalog
                        </a>
                    </li>
                    <li>
                        <a href="/report" class="nav-link link-dark @if($title == "Report") active @endif">
                            <i class="fa-solid fa-chart-simple"></i> Report
                        </a>
                    </li>
                </ul>
                <hr>
                @if (Auth::check())
                <div class="d-flex justify-content-center ">
                    <a href="/logout" class="nav-link link-light rounded bg-primary"><h6>LOGOUT</h6></a>
                </div>
                @endif
            </div>

        </div>
        <button onclick="Toggle()" class="toggle-btn" ></button>
        {{-- END SIDEBAR --}}