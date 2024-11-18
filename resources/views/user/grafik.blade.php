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

    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
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
                        <h3 class="page-title mb-0 p-0">Grafik</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Riwayat Kecermatan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Grafik Kuis</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <!-- Row untuk grafik dan informasi lainnya -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div>
                                        <h3 class="card-title">Grafik Nilai Kecermatan</h3>
                                        <h6 class="card-subtitle">Perbandingan Nilai tiap sesi</h6>
                                    </div>
                                </div>
                                <div id="grafikLine" class="ct-chart ct-perfect-fourth"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer"> © 2021 Mobeos Rumbel by <a href="https://www.wrappixel.com/">wrappixel.com </a>
            </footer>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>

    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Data untuk grafik garis
            const dataLineChart = {
                labels: @json($labels),  // Pastikan Anda mengirimkan data labels dari Laravel
                series: [
                    @json($scores)  // Data yang ingin ditampilkan dalam bentuk grafik (nilai kecermatan)
                ]
            };

            // Membuat grafik garis (Line Chart)
            new Chartist.Line('#grafikLine', dataLineChart, {
                fullWidth: true,
                chartPadding: {
                    right: 40
                },
                lineSmooth: Chartist.Interpolation.simple({
                    divisor: 2
                }),
                axisY: {
                    onlyInteger: true,
                    offset: 20
                }
            });

        });
    </script>

</body>

</html>
