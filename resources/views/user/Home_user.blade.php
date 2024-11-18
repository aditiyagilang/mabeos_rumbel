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
    <title>MABEOS RUMBEL</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo_mobeos.png">
    <link href="{{ 'assets/css/chartist.min.css' }}" rel="stylesheet">
    <link href="{{ 'assets/css/chartist-init.css' }}" rel="stylesheet">
    <link href="{{ 'assets/css/chartist-plugin-tooltip.css' }}" rel="stylesheet">
    <link href="{{ 'assets/css/c3.min.css' }}" rel="stylesheet">
    <link href="{{ 'assets/css/style.min.css' }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <style>
        .card {
            height: 350px; /* Tetapkan tinggi tetap untuk setiap card */
        }

        .card .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Atur isi card agar merata */
            text-align: center;
        }

        .card-text {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Batas 3 baris teks */
            -webkit-box-orient: vertical;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
            align-items: center; /* Menambahkan ini agar gambar berada di tengah vertikal */
        }

        .card-body img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px; /* Memberikan jarak antara gambar dan teks */
        }
    </style>

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
        @include('user.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Dshboard</h3>
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
                <div class="row">
                    <!-- Rata-rata Nilai -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Rata-rata Nilai</h5>
                                <h1 class="display-3 text-primary">85</h1>
                                <p class="card-text">Rata-rata nilai dari semua kuis yang telah Anda kerjakan.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Jumlah Kuis yang Telah Dikerjakan -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Jumlah Kuis yang Telah Dikerjakan</h5>
                                <h1 class="display-3 text-success">12</h1>
                                <p class="card-text">Jumlah total kuis yang telah Anda selesaikan.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Pintasan Profil -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="https://via.placeholder.com/100" class="rounded-circle mb-3" alt="Foto Profil">
                                <h5 class="card-title">John Doe</h5>
                                <p class="card-text">Email: john.doe@example.com</p>
                                <p class="card-text">ID User: 12345</p>
                                <a href="/profile" class="btn btn-info mt-3">Lihat Profil</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row untuk Kuis -->
                <div class="row">
                    <!-- Card untuk Kuis Kecerdasan -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <i class="mdi mdi-lightbulb-on fa-3x text-primary mb-3"></i>
                                <h5 class="card-title">Kuis Kecerdasan</h5>
                                <p class="card-text">
                                    Kuis ini dirancang untuk mengukur kemampuan logika, pemecahan masalah, dan berpikir analitis.
                                </p>
                                <a href="/kuis-kecerdasan" class="btn btn-primary mt-3">Mulai</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card untuk Kuis Kecermatan -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <i class="mdi mdi-eye fa-3x text-warning mb-3"></i>
                                <h5 class="card-title">Kuis Kecermatan</h5>
                                <p class="card-text">
                                    Kuis ini fokus pada kemampuan memperhatikan detail, kecepatan berpikir, dan ketelitian.
                                </p>
                                <a href="/kuis-kecermatan" class="btn btn-warning mt-3">Mulai</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card untuk Kuis Kepribadian -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <i class="mdi mdi-heart fa-3x text-success mb-3"></i>
                                <h5 class="card-title">Kuis Kepribadian</h5>
                                <p class="card-text">
                                    Kuis ini mengungkap karakteristik, sikap, dan gaya berperilaku seseorang dalam berbagai situasi.
                                </p>
                                <a href="/kuis-kepribadian" class="btn btn-success mt-3">Mulai</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card untuk Kuis CPNS -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <i class="mdi mdi-clipboard-check fa-3x text-danger mb-3"></i>
                                <h5 class="card-title">Kuis CPNS</h5>
                                <p class="card-text">
                                    Kuis ini dirancang khusus untuk persiapan tes seleksi CPNS, meliputi TWK, TIU, dan TKP.
                                </p>
                                <a href="/kuis-cpns" class="btn btn-danger mt-3">Mulai</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer"> © 2021 Mobeos Rumbel by <a href="https://www.wrappixel.com/">wrappixel.com </a>
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
