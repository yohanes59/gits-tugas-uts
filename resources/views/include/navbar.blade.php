<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <div class="fs-5 fw-medium mx-4 text-black">Selamat datang, {{ auth()->user()->name}}</div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if (auth()->user()->role == 'Admin')
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        Admin
                    </span>    
                @else
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        Kasir
                    </span>
                @endif
                <img class="img-profile rounded-circle"
                    src="{{ asset('img/default.png') }}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                @if (auth()->user()->role == 'Kasir')
                    <a class="dropdown-item" href="{{ url('cashier/profile/'.auth()->user()->id) }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                @endif
                @if (auth()->user()->role == 'Admin')
                    <a class="dropdown-item" href="{{ url('/admin/cashier-account') }}">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Cashier Account
                    </a>
                @endif
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                    </a>
                </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->