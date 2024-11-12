<!-- resources/views/layouts/header.blade.php -->
<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <a class="navbar-brand ms-4" href="/dashboard">
                <b class="logo-icon">
                    <img src="../assets/images/logo-light-icon.png" alt="homepage" class="dark-logo" />
                </b>
                <span class="logo-text">
                    <img src="../assets/images/logo-light-text.png" alt="homepage" class="dark-logo" />
                </span>
            </a>
            <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav d-lg-none d-md-block ">
                <li class="nav-item">
                    <a class="nav-toggler nav-link waves-effect waves-light text-white "
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav me-auto mt-md-0 ">
                <li class="nav-item search-box">
                    <a class="nav-link text-muted" href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search" style="display: none;">
                        <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                            class="srh-btn"><i class="ti-close"></i></a> </form>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="/profile" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Dynamically load user's photo and name from session -->
                        @if(session('img_url') && session('user_name'))
                            <img src="{{ asset(session('img_url')) }}" alt="user" class="profile-pic me-2">
                            {{ session('user_name') }}
                        @else
                            <!-- Fallback if session values are not available -->
                            <img src="../assets/images/users/default.jpg" alt="user" class="profile-pic me-2">
                            Guest
                        @endif
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
