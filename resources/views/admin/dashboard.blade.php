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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
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
                <!-- Kuis Dimulai -->
                <div class="col-lg-4">
                    <div class="card text-white bg-danger">
                        <div class="card-body d-flex align-items-center">
                            <i class="fa fa-play-circle fa-2x me-3"></i> <!-- Ikon Play untuk Kuis Dimulai -->
                            <div>
                                <h5 class="card-title">Kuis Dimulai</h5>
                                <p class="card-text fs-4">{{ $startCount }}</p> <!-- Menampilkan jumlah kuis dimulai -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Kuis Berlangsung -->
                <div class="col-lg-4">
                    <div class="card text-white bg-warning">
                        <div class="card-body d-flex align-items-center">
                            <i class="fa fa-hourglass-half fa-2x me-3"></i> <!-- Ikon Hourglass untuk Kuis Berlangsung -->
                            <div>
                                <h5 class="card-title">Kuis Berlangsung</h5>
                                <p class="card-text fs-4">{{ $ongoingCount }}</p> <!-- Menampilkan jumlah kuis berlangsung -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kuis Selesai -->
                <div class="col-lg-4">
                    <div class="card text-white bg-success">
                        <div class="card-body d-flex align-items-center">
                            <i class="fa fa-check-circle fa-2x me-3"></i> <!-- Ikon Check untuk Kuis Selesai -->
                            <div>
                                <h5 class="card-title">Kuis Selesai</h5>
                                <p class="card-text fs-4">{{ $endCount }}</p> <!-- Menampilkan jumlah kuis selesai -->
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
                                                <h3 class="card-title">Grafik Nilai</h3>
                                                <h6 class="card-subtitle">Perbandingan Nilai Berdasarkan Kuis</h6>
                                            </div>
                                            <div class="ms-lg-auto mx-sm-auto mx-lg-0">
                                                <label for="quiz-filter" class="form-label me-2">Pilih Kuis:</label>
                                                <select id="quiz-filter" class="form-select form-select-sm d-inline-block" style="width: auto;">
                                                    @foreach($quizzes as $quiz)
                                                        <option value="{{ $quiz->quizs_id }}" {{ $quiz->quizs_id == $latestQuiz->quizs_id ? 'selected' : '' }}>
                                                            {{ $quiz->quizs_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="amp-pxl" style="height: 360px;">
                                            <canvas id="scoreChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <!-- Card untuk jumlah pengguna -->
                        <div class="card mb-4">
                            <div class="card-body d-flex align-items-center">
                                <i class="fa fa-users fa-2x text-primary me-3"></i> <!-- Ikon pengguna -->
                                <div>
                                    <h5 class="card-title">Total Pengguna</h5>
                                    <p class="card-text fs-4">{{$userCount}}</p> <!-- Ganti angka dengan data dinamis jika diperlukan -->
                                </div>
                            </div>
                        </div>

                        <!-- Card untuk ongoing quizzes -->
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Kuis Berlangsung</h3>
                                <h6 class="card-subtitle">Berikut terdapat list kuis yang sedang berlangsung. Klik button untuk melihat token kuis.</h6>

                                <ul class="list-group list-group-flush borderless-list">
                                    @foreach($ongoingQuizzes as $quiz)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $quiz->quizs_name }}
                                            <button type="button" class="btn btn-primary btn-sm show-token" data-token="{{ $quiz->token }}">Token</button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>

                    <!-- Modal untuk token -->
                    <div class="modal fade" id="tokenModal" tabindex="-1" aria-labelledby="tokenModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tokenModalLabel">Token Kuis</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Pencarian token -->
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Cari token..." id="searchInput">
                                        <button class="btn btn-outline-secondary" onclick="searchFunction()">
                                            <i class="bi bi-search"></i> <!-- Bootstrap Icons -->
                                        </button>
                                    </div>
                                    <p>Token: <span id="tokenValue">ABCD1234</span></p> <!-- Ganti token dengan data dinamis jika diperlukan -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer"> © 2021 Material Pro Admin by <a href="https://www.wrappixel.com/">wrappixel.com </a>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        let scoreData = @json($scores);
        let quizName = @json($latestQuiz ? $latestQuiz->quizs_name : '');

        const ctx = document.getElementById('scoreChart').getContext('2d');
        const scoreChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Array(scoreData.length).fill(''),  // Empty labels
                datasets: [{
                    label: 'Nilai Siswa',
                    data: scoreData,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: quizName
                        }
                    },
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            stepSize: 10
                        },
                        title: {
                            display: true,
                            text: 'Score'
                        }
                    }
                }
            }
        });

        document.getElementById('quiz-filter').addEventListener('change', function () {
            const selectedQuizId = this.value;

            fetch(`/get-quiz-scores/${selectedQuizId}`)
                .then(response => response.json())
                .then(data => {
                    scoreChart.data.labels = Array(data.scores.length).fill('');  // Reset labels
                    scoreChart.data.datasets[0].data = data.scores;
                    scoreChart.options.scales.x.title.text = this.options[this.selectedIndex].text;
                    scoreChart.update();
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>




    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Seleksi semua tombol dengan class "show-token"
            const tokenButtons = document.querySelectorAll('.show-token');

            // Loop melalui setiap tombol dan tambahkan event listener
            tokenButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Ambil token dari atribut data-token pada tombol
                    const token = this.getAttribute('data-token');

                    
                    Swal.fire({
                        title: token,
                        text: `Masukan Kode Token Diatas Untuk Melakukan Kuis`,
                        icon: 'info',
                        confirmButtonText: 'Tutup'
                    });
                });
            });
        });
    </script>
    <script src="{{ 'assets/js/jquery.min.js' }}"></script>
    <script src="{{ 'assets/js/bootstrap.bundle.min.js' }}"></script>
    <script src="{{ 'assets/js/app-style-switcher.js' }}"></script>
    <script src="{{ 'assets/js/waves.js' }}"></script>
    <script src="{{ 'assets/js/sidebarmenu.js' }}"></script>
    <script src="{{ 'assets/js/custom.js' }}"></script>
    <!-- <script src="{{ 'assets/js/chartist.min.js' }}"></script> -->
    <script src="{{ 'assets/js/chartist-plugin-tooltip.min.js' }}"></script>
    <script src="{{ 'assets/js/d3.min.js' }}"></script>
    <script src="{{ 'assets/js/c3.min.js' }}"></script>
    <script src="{{ 'assets/js/dashboard1.js' }}"></script>
</body>
</html>
