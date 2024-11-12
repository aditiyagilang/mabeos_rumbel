<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Material Pro Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <link href="{{ 'assets/css/chartist.min.css' }}" rel="stylesheet">
    <link href="{{ 'assets/css/chartist-init.css' }}" rel="stylesheet">
    <link href="{{ 'assets/css/chartist-plugin-tooltip.css' }}" rel="stylesheet">
    <link href="{{ 'assets/css/c3.min.css' }}" rel="stylesheet">
    <link href="{{ 'assets/css/style.min.css' }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('admin.navbar')
        @include('admin.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Dashboard</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <!-- Row untuk tiga card status kuis -->
                <div class="row mb-4">
                    <div class="col-lg-4">
                        <div class="card text-white bg-danger">
                            <div class="card-body d-flex align-items-center">
                                <i class="fa fa-play-circle fa-2x me-3"></i> <!-- Ikon Play untuk Kuis Dimulai -->
                                <div>
                                    <h5 class="card-title">Kuis Dimulai</h5>
                                    <p class="card-text fs-4">20</p> <!-- Ganti angka dengan data dinamis jika diperlukan -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card text-white bg-warning">
                            <div class="card-body d-flex align-items-center">
                                <i class="fa fa-hourglass-half fa-2x me-3"></i> <!-- Ikon Hourglass untuk Kuis Berlangsung -->
                                <div>
                                    <h5 class="card-title">Kuis Berlangsung</h5>
                                    <p class="card-text fs-4">10</p> <!-- Ganti angka dengan data dinamis jika diperlukan -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card text-white bg-success">
                            <div class="card-body d-flex align-items-center">
                                <i class="fa fa-check-circle fa-2x me-3"></i> <!-- Ikon Check untuk Kuis Selesai -->
                                <div>
                                    <h5 class="card-title">Kuis Selesai</h5>
                                    <p class="card-text fs-4">15</p> <!-- Ganti angka dengan data dinamis jika diperlukan -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row untuk grafik dan informasi lainnya -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <div>
                                                <h3 class="card-title">Sales Overview</h3>
                                                <h6 class="card-subtitle">Ample Admin Vs Pixel Admin</h6>
                                            </div>
                                            <div class="ms-lg-auto mx-sm-auto mx-lg-0">
                                                <ul class="list-inline d-flex">
                                                    <li class="me-4">
                                                        <h6 class="text-success"><i
                                                                class="fa fa-circle font-10 me-2"></i>Ample</h6>
                                                    </li>
                                                    <li>
                                                        <h6 class="text-info"><i
                                                                class="fa fa-circle font-10 me-2"></i>Pixel</h6>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="amp-pxl" style="height: 360px;">
                                            <div class="chartist-tooltip"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Our Visitors</h3>
                                <h6 class="card-subtitle">Different Devices Used to Visit</h6>
                                <div id="visitor"
                                    style="height: 290px; width: 100%; max-height: 290px; position: relative;"
                                    class="c3">
                                    <div class="c3-tooltip-container"
                                        style="position: absolute; pointer-events: none; display: none;">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <hr class="mt-0 mb-0">
                            </div>
                            <div class="card-body text-center">
                                <ul class="list-inline d-flex justify-content-center align-items-center mb-0">
                                    <li class="me-4">
                                        <h6 class="text-info"><i class="fa fa-circle font-10 me-2"></i>Mobile</h6>
                                    </li>
                                    <li class="me-4">
                                        <h6 class="text-primary"><i class="fa fa-circle font-10 me-2"></i>Desktop</h6>
                                    </li>
                                    <li class="me-4">
                                        <h6 class="text-success"><i class="fa fa-circle font-10 me-2"></i>Tablet</h6>
                                    </li>
                                </ul>
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
    <script src="{{ 'assets/js/chartist.min.js' }}"></script>
    <script src="{{ 'assets/js/chartist-plugin-tooltip.min.js' }}"></script>
    <script src="{{ 'assets/js/d3.min.js' }}"></script>
    <script src="{{ 'assets/js/c3.min.js' }}"></script>
    <script src="{{ 'assets/js/dashboard1.js' }}"></script>
</body>

</html>
