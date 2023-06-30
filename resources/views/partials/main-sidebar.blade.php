<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Laundry System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/img_avatar.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            @auth
            <div class="info">
                <span class="d-block text-gray">{{ auth()->user()->name }}</span>
            </div>
            @endauth
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with
                font-awesome or any other icon font library -->

                <li class="nav-item menu-open mb-2">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open mb-2">
                    <a href="{{ route('employee.index') }}" class="nav-link {{ request()->routeIs('employee.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Employees
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open mb-2">
                    <a href="{{ route('customer.index') }}" class="nav-link {{ request()->routeIs('customer.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Customers
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open mb-2">
                    <a href="{{ route('laundry.index') }}" class="nav-link {{ request()->routeIs('laundry.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Laundry
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open mb-2">
                    <a href="{{ route('transaction.index') }}" class="nav-link {{ request()->routeIs('transaction.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Transaction
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open mb-2">
                    <a href="{{ route('expenditure.index') }}" class="nav-link {{ request()->routeIs('expenditure.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Expenditure
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open my-2">
                    <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Log out?')">
                        @csrf
                        <i class="nav-icon fas fa-sign-out pl-3 text-white"></i>
                        <input type="submit" value="Logout" class="btn text-white">
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
