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