<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ Request::is('user/dashboard') ? 'active' : '' }}"
                    href="{{ url('user/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link {{ Request::is('user/items') || Request::is('user/add-items') ? 'collapse active' : 'collapsed' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Items
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('user/items') || Request::is('user/add-items') ? 'show' : '' }}"
                    id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('user/add-items') ? 'active' : '' }}"
                            href="{{ url('user/add-items') }}">Add Items</a>
                        <a class="nav-link {{ Request::is('user/items') || Request::is('user/edit-items/*') ? 'active' : '' }}"
                            href="{{ url('user/items') }}">View Items</a>
                    </nav>
                </div>



            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:{{ strtoupper(Auth::user()->name) }}</div>

        </div>
    </nav>
</div>
