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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo_mobeos.png">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist/dist/chartist.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chartist/dist/chartist.min.css">
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
        @include('admin.navbar')
        @include('user.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Riwayat Skor</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Riwayat Skor</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <div>
                                                <h3 class="card-title">Grafik Nilai</h3>
                                                <h6 class="card-subtitle">Perbandingan Nilai Siswa Berdasarkan Kuis</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <!-- Area untuk grafik -->
                                        <div class="amp-pxl-line" style="height: 360px; width: 100%;" id="chart"></div>
                                        <!-- <div class="amp-pxl-line" style="height: 360px; width: 100%;"></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Tabel Tipe</h4>
                                    <div class="d-flex align-items-center">
                                        <input type="text" class="form-control me-2" placeholder="Cari..." id="searchInput">
                                        <button class="btn btn-outline-secondary" onclick="searchFunction()">
                                            <i class="bi bi-search"></i> <!-- Bootstrap Icons -->
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered table-hover table-striped user-table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Nama Kuis</th>
                                                <th>Waktu Mulai</th>
                                                <th>Skor</th>
                                                <th>Waktu Submit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($scores as $score)
                                                <tr>
                                                    <td>{{ $score->quiz->name }}</td>
                                                    <td>{{ $score->quiz->start_time }}</td>
                                                    <td>{{ $score->score }}</td>
                                                    <td>
                                                    @if($score->created_at)
                                                        {{ $score->created_at->format('d M Y, H:i') }}
                                                    @else
                                                        Data tidak tersedia
                                                    @endif
                                                </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                <nav aria-label="...">
                                    <ul class="pagination">
                                      <li class="page-item disabled">
                                        <a class="page-link">Previous</a>
                                      </li>
                                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                      <li class="page-item" aria-current="page">
                                        <a class="page-link" href="#">2</a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                      </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer"> © 2021 Material Pro Admin by <a href="https://www.wrappixel.com/">wrappixel.com </a>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chartist/dist/chartist.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(function () {
    "use strict";

    // Ambil data dari server melalui AJAX
    $.ajax({
        url: '/get-scores', // URL untuk mendapatkan data skor
        method: 'GET',
        success: function(data) {

            // Data yang diterima dari server
            const nilaiData = data;
            console.log(data);

            // Fungsi untuk membuat grafik Bar
            function createBarChart(data) {
                return new Chartist.Bar('.amp-pxl-bar', {
                    labels: ['Siswa A', 'Siswa B', 'Siswa C', 'Siswa D', 'Siswa E'],  // Bisa disesuaikan
                    series: [data]
                }, {
                    axisX: {
                        position: 'end',
                        showGrid: false
                    },
                    axisY: {
                        position: 'start'
                    },
                    high: 100,
                    low: 0,
                    plugins: [
                        Chartist.plugins.tooltip()
                    ]
                });
            }

            // Inisialisasi chart dengan data kuis pertama
            let currentBarChart = createBarChart(nilaiData['Kuis 1']); // Gantilah 'Kuis 1' dengan nama kuis yang valid

            // Tambahkan event listener untuk filter kuis
            $('#quiz-filter').on('change', function () {
                const selectedQuiz = $(this).val();

                // Perbarui data chart berdasarkan kuis yang dipilih
                currentBarChart.update({
                    labels: ['Siswa A', 'Siswa B', 'Siswa C', 'Siswa D', 'Siswa E'],  // Bisa disesuaikan
                    series: [nilaiData[selectedQuiz]]
                });
            });

            // Animasi pada grafik bar
            currentBarChart.on('draw', function (data) {
                if (data.type === 'bar') {
                    data.element.animate({
                        y2: {
                            dur: 500,
                            from: data.y1,
                            to: data.y2,
                            easing: Chartist.Svg.Easing.easeInOutElastic
                        },
                        opacity: {
                            dur: 500,
                            from: 0,
                            to: 1,
                            easing: Chartist.Svg.Easing.easeInOutElastic
                        }
                    });
                }
            });

            // Fungsi untuk membuat grafik Line
            function createLineChart() {
                return new Chartist.Line('.amp-pxl-line', {
                    labels: ['Kuis A', 'Kuis B', 'Kuis C', 'Kuis D', 'Kuis E'], // Sesuaikan labelnya
                    series: [
                        nilaiData['Kuis 1'],  // Ambil data sesuai kuis yang ada
                        nilaiData['Kuis 2'],  // Ambil data sesuai kuis lainnya
                        nilaiData['Kuis 3']   // Ambil data sesuai kuis lainnya
                    ]
                }, {
                    fullWidth: true,
                    showArea: true,
                    axisX: {
                        position: 'end',
                        showGrid: false
                    },
                    axisY: {
                        position: 'start',
                        labelInterpolationFnc: function (value) {
                            return value + '%';
                        }
                    },
                    plugins: [
                        Chartist.plugins.tooltip()
                    ]
                });
            }

            // Inisialisasi grafik garis
            let currentLineChart = createLineChart();

            // Animasi pada grafik garis
            currentLineChart.on('draw', function (data) {
                if (data.type === 'line') {
                    data.element.animate({
                        d: {
                            dur: 500,
                            from: data.path.clone().scale(0).translate(0, 0).stringify(),
                            to: data.path.stringify(),
                            easing: Chartist.Svg.Easing.easeInOutElastic
                        },
                        opacity: {
                            dur: 500,
                            from: 0,
                            to: 1,
                            easing: Chartist.Svg.Easing.easeInOutElastic
                        }
                    });
                }
            });
        },
        error: function(err) {
            console.error("Error fetching data:", err);
        }
    });
});
</script>

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

</body>

</html>
