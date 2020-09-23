<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand pt-0" href="{{ route('admin.dashboard') }}">
              ALEX. J.
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">

                <!-- Navigation -->
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.productsUnsorted') }}">
                            <i class="ni ni-chart-pie-35 text-primary"></i> Product (unsorted)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.productsSorted') }}">
                            <i class="ni ni-chart-bar-32 text-primary"></i> Product (sorted)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
