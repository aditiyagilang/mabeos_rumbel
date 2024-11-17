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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
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
        @include('admin.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Table</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Table</li>
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
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Tabel Kuis</h4>
                                <div class="d-flex align-items-center">
                                    <input type="text" class="form-control me-2" placeholder="Cari..." id="searchInput" onkeyup="searchFunction()">
                                    <button class="btn btn-outline-secondary" onclick="searchFunction()">
                                        <i class="bi bi-search"></i> <!-- Bootstrap Icons -->
                                    </button>
                                        
                                </div>
                            </div>
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered table-hover table-striped user-table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>ID Kuis</th>
                                            <th>Nama Tipe</th>
                                            <th>Nama Kuis</th>
                                            <th>Waktu Mulai</th>
                                            <th>Waktu Selesai</th>
                                            <th>Token</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="quizzesTableBody">
                                        @forelse($quizzes as $index => $quiz)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td class="quiz-id">{{ $quiz->quizs_id }}</td>
                                                <td class="quiz-type">{{ $quiz->type->types_name ?? 'N/A' }}</td>
                                                <td class="quiz-name">{{ $quiz->quizs_name }}</td>
                                                <td class="quiz-start-date">{{ $quiz->start_date }}</td>
                                                <td class="quiz-end-date">{{ $quiz->end_date }}</td>
                                                <td class="quiz-token">{{ $quiz->token }}</td>
                                                <td class="quiz-status">{{ $quiz->status }}</td>
                                                <td>
                                                    @if($quiz->type->types_name !== 'Kuis Kecermatan') 
                                                        
                                                        <form action="{{ route('index.user-list') }}" method="GET" style="display:inline;">
                                                            <input type="hidden" name="qid" value="{{ Crypt::encryptString($quiz->quizs_id) }}">
                                                            <button type="submit" class="btn btn-secondary">Lihat</button>
                                                        </form>
                                                    @else
                                                        <span>Tidak ada aksi untuk Kuis Kecermatan</span>
                                                    @endif

                                                    @if($quiz->type->types_name !== 'Kuis Kecermatan')
                                                    <form action="{{ route('quizzes.updateShow', ['hash' => Crypt::encryptString($quiz->quizs_id)]) }}" method="POST" style="display:inline;">
                                                        @method('PUT')
                                                        @csrf
                                                        <input type="hidden" name="quizs_id" value="{{ $quiz->quizs_id }}">
                                                        
                                                        <!-- Tombol Aksi berdasarkan status show_score -->
                                                        @if($quiz->show_score === 'true')
                                                            <!-- Ikon jika show_score true -->
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="bi bi-check-circle"></i> Update ke False
                                                            </button>
                                                        @else
                                                            <!-- Ikon jika show_score false -->
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="bi bi-x-circle"></i> Update ke True
                                                            </button>
                                                        @endif
                                                    </form>
                                                @else
                                                    <span>Tidak ada aksi untuk Kuis Kecermatan</span>
                                                @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Tidak ada data kuis yang ditemukan</td>
                                            </tr>
                                        @endforelse
                                    </tbody>

                                </table>
                            </div>
                            <!-- Pagination -->
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
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ 'assets/js/bootstrap.bundle.min.js' }}"></script>
    <script src="{{ 'assets/js/app-style-switcher.js' }}"></script>
    <!--Wave Effects -->
    <script src="{{ 'assets/js/waves.js' }}"></script>
    <!--Menu sidebar -->
    <script src="{{ 'assets/js/sidebarmenu.js' }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ 'assets/js/custom.js' }}"></script>
    <script>
    function searchFunction() {
        // Ambil nilai dari input pencarian
        let searchInput = document.getElementById('searchInput').value.toLowerCase();
        // Ambil semua baris tabel
        let tableRows = document.querySelectorAll('#quizzesTableBody tr');
        
        tableRows.forEach(row => {
            // Ambil data dari elemen dengan class sesuai kolom yang akan dicari
            let quizId = row.querySelector('.quiz-id').textContent.toLowerCase();
            let quizType = row.querySelector('.quiz-type').textContent.toLowerCase();
            let quizName = row.querySelector('.quiz-name').textContent.toLowerCase();
            let startDate = row.querySelector('.quiz-start-date').textContent.toLowerCase();
            let endDate = row.querySelector('.quiz-end-date').textContent.toLowerCase();
            let quizToken = row.querySelector('.quiz-token').textContent.toLowerCase();
            let quizStatus = row.querySelector('.quiz-status').textContent.toLowerCase();

            // Periksa apakah input pencarian ditemukan di salah satu kolom
            if (quizId.includes(searchInput) || quizType.includes(searchInput) || quizName.includes(searchInput) || 
                startDate.includes(searchInput) || endDate.includes(searchInput) || quizToken.includes(searchInput) || 
                quizStatus.includes(searchInput)) {
                row.style.display = ''; // Tampilkan baris
            } else {
                row.style.display = 'none'; // Sembunyikan baris
            }
        });
    }
</script>
    <script>

    // Ketika tombol Edit diklik
    const editModal = document.getElementById('editUserModal');
    editModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget; // Tombol yang diklik
        var quizId = button.getAttribute('data-id'); // ID kuis
        var quizName = button.getAttribute('data-name'); // Nama kuis
        var typeId = button.getAttribute('data-type-id'); // ID tipe yang dipilih
        var startDate = button.getAttribute('data-start-date'); // Waktu mulai
        var endDate = button.getAttribute('data-end-date'); // Waktu selesai
        var token = button.getAttribute('data-token'); // Token
        var status = button.getAttribute('data-status'); // Status kuis

        // Isi form dengan data
        var form = document.getElementById('editUserForm');
        form.action = '/quizzes/' + quizId; // Update action form dengan URL yang benar
        document.getElementById('editIdKuis').value = quizId; // Isi input ID kuis
        document.getElementById('editKuisName').value = quizName; // Isi input Nama kuis
        document.getElementById('editWaktuMulai').value = startDate; // Isi input Waktu Mulai
        document.getElementById('editWaktuSelesai').value = endDate; // Isi input Waktu Selesai
        document.getElementById('editToken').value = token; // Isi input Token

        // Set value dropdown 'types_id' sesuai dengan data yang dipilih
        var selectType = document.getElementById('types_id');
        selectType.value = typeId; // Set value yang dipilih pada dropdown

        // Set value dropdown 'status' sesuai dengan data yang dipilih
        var selectStatus = document.getElementById('editStatus');
        selectStatus.value = status; // Set value status pada dropdown
    });
</script>


<script>
    // Ketika tombol Edit diklik
    $('#editUserModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Tombol yang diklik
        var quizId = button.data('id'); // Mengambil data-id dari tombol
        var quizName = button.data('name'); // Mengambil data-name dari tombol
        var startDate = button.data('start-date'); // Mengambil data-start-date dari tombol
        var endDate = button.data('end-date'); // Mengambil data-end-date dari tombol
        var token = button.data('token'); // Mengambil data-token dari tombol

        // Mengisi nilai input modal dengan data yang diambil
        var modal = $(this);
        modal.find('#editIdKuis').val(quizId); // Mengisi ID kuis ke input
        modal.find('#editKuisName').val(quizName); // Mengisi Nama kuis ke input
        modal.find('#editWaktuMulai').val(startDate); // Mengisi Waktu Mulai ke input
        modal.find('#editWaktuSelesai').val(endDate); // Mengisi Waktu Selesai ke input
        modal.find('#editToken').val(token); // Mengisi Token ke input
    });
</script>

</body>

</html>
