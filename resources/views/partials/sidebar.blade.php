<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15 ms-3">
            <i class="fas fa-book-open"></i>
        </div>
        <div class="sidebar-brand-text mx-1">Smart Perpus</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (Auth::user())
        <!-- Profile -->
        <div class="sidebar-brand-text mx-3 text-center text-light">
            <h6><b>{{ Auth::user()->username }}</b></h5>
                <small>
                    <p>{{ Auth::user()->status }}</p>
                </small>
        </div>


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        @if (Auth::user()->role_id == 1)
            <!-- Nav Item - Dashboard -->
            <li class="nav-item  {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="/dashboard"
                    class="nav-link {{ request()->route()->uri == 'dashboard' ? 'active border-left-info' : '' }}">
                    <i class="fas fa-fw fa-desktop"></i>
                    <span class="">Dashboard</span></a>
            </li>

            <!-- Nav Item Books -->
            <li
                class="nav-item {{ Request::is('books') || Request::is('book-add') || Request::is('book-edit/*') || Request::is('book-deleted') ? 'active' : '' }}">
                <a href="/books"
                    class="nav-link {{ request()->route()->uri == 'books' || request()->route()->uri == 'book-add' || request()->route()->uri == 'book-edit/{slug}' || request()->route()->uri == 'book-deleted' ? 'active border-left-info' : '' }}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>
                        Books
                    </span>
                </a>
            </li>

            <!-- Nav Item Book Category -->
            <li
                class="nav-item {{ Request::is('categories') || Request::is('category-add') || Request::is('category-edit/*') || Request::is('category-deleted') ? 'active' : '' }}">
                <a href="/categories"
                    class="nav-link {{ request()->route()->uri == 'categories' || request()->route()->uri == 'category-add' || request()->route()->uri == 'category-deleted' || request()->route()->uri == 'category-edit/{slug}' ? 'active border-left-info' : '' }}">
                    <i class="fab fa-fw fa-stack-overflow"></i>
                    <span>
                        Book Category
                    </span>
                </a>
            </li>

            <!-- Nav Item - Users -->
            <li
                class="nav-item {{ Request::is('users') || Request::is('registered-users') || Request::is('user-detail/*') || Request::is('user-banned') ? 'active' : '' }}">
                <a href="/users"
                    class="nav-link {{ request()->route()->uri == 'users' || request()->route()->uri == 'registered-users' || request()->route()->uri == 'user-detail/{slug}' || request()->route()->uri == 'user-banned' ? 'active border-left-info' : '' }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>
                        Users
                    </span>
                </a>
            </li>

            <!-- Nav Item - Transaction -->
            <li class="nav-item {{ Request::is('transaction') ? 'active' : '' }}">
                <a href="/transaction"
                    class="nav-link {{ request()->route()->uri == 'transaction' ? 'active border-left-info' : '' }}">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Loaning Books</span>
                </a>
            </li>

            <!-- Nav Item - Transaction -->
            <li class="nav-item {{ Request::is('books-return') ? 'active' : '' }}">
                <a href="/books-return"
                    class="nav-link {{ request()->route()->uri == 'books-return' ? 'active border-left-info' : '' }}">
                    <i class="fas fa-fw fa-window-restore"></i>
                    <span>Book Return</span>
                </a>
            </li>

            <!-- Nav Item - Log Transaction -->
            <li class="nav-item {{ Request::is('log-transaction') ? 'active' : '' }}">
                <a href="/log-transaction"
                    class="nav-link {{ request()->route()->uri == 'log-transaction' ? 'active border-left-info' : '' }}">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Log Transaction</span>
                </a>
            </li>
        @else
            <li class="nav-item">
                <!-- Nav Item - Buku -->
            <li class="nav-item {{ Request::is('books') ? 'active' : '' }}">
                <a href="/books"
                    class="nav-link {{ request()->route()->uri == 'books' ? 'active border-left-info' : '' }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>List Buku</span>
                </a>
            </li>

            <!-- Nav Item - Profile -->
            <li class="nav-item {{ Request::is('profile') ? 'active' : '' }}">
                <a href="/profile"
                    class="nav-link {{ request()->route()->uri == 'profile' ? 'active border-left-info' : '' }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Profile</span>
                </a>
            </li>
            </li>
        @endif
    @else
        <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
            <a href="/login"
                class="nav-link {{ request()->route()->uri == 'books' ? 'active border-left-info' : '' }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Sign In</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
            <a href="/register"
                class="nav-link {{ request()->route()->uri == 'books' ? 'active border-left-info' : '' }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Sign Up</span>
            </a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0 " id="sidebarToggle"></button>
    </div>

</ul>
