<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Material Pro Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <link href="{{ 'assets/css/style.min.css' }}" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
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
                                <img src="../assets/images/users/1.jpg" alt="user" class="profile-pic me-2">Markarn Doe
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/dashboard" aria-expanded="false"><i class="mdi me-2 mdi-gauge"></i><span
                                class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/profile" aria-expanded="false">
                                <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="mdi me-2 mdi-table"></i>
                                <span class="hide-menu">Tabel</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="/tabel-tipe" class="sidebar-link">
                                        <i class="mdi mdi-table-large"></i>
                                        <span class="hide-menu">Tabel Tipe</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/tabel-kuis" class="sidebar-link">
                                        <i class="mdi mdi-table-large"></i>
                                        <span class="hide-menu">Tabel Kuis</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/tabel-pertanyaan" class="sidebar-link">
                                        <i class="mdi mdi-table-large"></i>
                                        <span class="hide-menu">Tabel Pertanyaan</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/tabel-skor" class="sidebar-link">
                                        <i class="mdi mdi-table-large"></i>
                                        <span class="hide-menu">Tabel Skor</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/login" aria-expanded="false">
                                        <i class="mdi me-2 mdi-logout"></i><span class="hide-menu">Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Profile</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body profile-card">
                                <center class="mt-4">
                                    <input type="file" id="uploadPhoto" accept="image/*" style="display: none;" onchange="previewPhoto(event)" />
                                    <div class="photo-container" onclick="document.getElementById('uploadPhoto').click();">
                                        <img id="profilePhoto" src="../assets/images/users/5.jpg" alt="Click to change photo" />
                                        <div class="overlay">
                                            <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                            <p>Click to change photo</p>
                                        </div>
                                    </div>
                                    <h4 class="card-title mt-2">Hanna Gover</h4>
                                    <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                                </center>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <h2 class="card-title">Ganti Password</h2>
                                <form class="form-horizontal form-material mx-2">
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Password Sebelumnya</label>
                                        <div class="col-md-12">
                                            <input type="password"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Password Baru</label>
                                        <div class="col-md-12">
                                            <input type="password"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Konfirmasi Password</label>
                                        <div class="col-md-12">
                                            <input type="password"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <button class="btn btn-success mx-auto mx-md-0 text-white">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2">
                                    <h2 class="card-title">Ubah Profile</h2>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Nama Lengkap</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Johnathan Doe"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Username</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Johnathan Doe"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Tanggal Lahir</label>
                                        <div class="col-md-12">
                                            <input type="date"
                                                class="form-control ps-0 form-control-line" name="tanggallahir"
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="johnathan@admin.com"
                                                class="form-control ps-0 form-control-line" name="example-email"
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="123 456 7890"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <button class="btn btn-success mx-auto mx-md-0 text-white">Update
                                                Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer"> © 2021 Material Pro Admin by <a href="https://www.wrappixel.com/">wrappixel.com </a>
            </footer>
        </div>
    </div>
    <script src="{{ 'assets/js/jquery.min.js' }}"></script>
    <script src="{{ 'assets/js/bootstrap.bundle.min.js' }}"></script>
    <script src="{{ 'assets/js/app-style-switcher.js' }}"></script>
    <script src="{{ 'assets/js/waves.js' }}"></script>
    <script src="{{ 'assets/js/sidebarmenu.js' }}"></script>
    <script src="{{ 'assets/js/custom.js' }}"></script>
</body>

</html>
