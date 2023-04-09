<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <img class="img-fluid" width="40" height="40" src="{{ asset('img/coffee.png') }}" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Coffee Shop</div>
    </div>

    <!-- Divider -->
    @if (Auth::check())
    <hr class="sidebar-divider my-0">
    @endif

    <!-- admin - Dashboard -->
    @if (auth()->user()->role == 'Admin')
        <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard Admin</span></a>
        </li>

        <!-- transaction list -->
        <li class="nav-item {{ request()->is('admin/transaction') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/transaction') }}">
                <i class="fa-solid fa-fw fa-money-bills"></i>
                <span>Transaction</span></a>
        </li>
        
        <!-- category -->
        <li class="nav-item {{ request()->is('admin/category') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/category') }}">
                <i class="fa-solid fa-fw fa-border-all"></i>
                <span>Category</span></a>
        </li>

        <!-- product -->
        <li class="nav-item {{ request()->is('admin/product') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/product') }}">
                <i class="fa-solid fa-fw fa-boxes-stacked"></i>
                <span>Product</span></a>
        </li>
    @endif

    <!-- kasir -->
    @if (auth()->user()->role == 'Kasir')
        <li class="nav-item {{ request()->is('cashier/cart') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('cashier/cart') }}">
                <i class="fa-solid fa-fw fa-cash-register"></i>
                <span>Cashier</span></a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->