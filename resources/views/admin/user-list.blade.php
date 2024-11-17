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

    <link href="{{ 'assets/css/style.min.css' }}" rel="stylesheet">
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet"> -->

    <!-- <link href="{{ 'assets/css/style.css' }}" rel="stylesheet"> -->
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
                                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
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
                                    <h4 class="card-title">Tabel Detail Pertanyaan</h4>
                                    <div class="d-flex align-items-center">
                                        <input type="text" class="form-control me-2" placeholder="Cari..." id="searchInput" onkeyup="searchFunction()">
                                        <button class="btn btn-outline-secondary" onclick="searchFunction()">
                                            <i class="bi bi-search"></i> <!-- Bootstrap Icons -->
                                        </button>
                                        <button class="btn btn-primary" id="openModal" data-bs-toggle="modal" data-bs-target="#addUserModal">Tambah</button>
                                    </div>

                                </div>

                                <div class="table-responsive mt-3">
                                <table class="table table-bordered table-hover table-striped user-table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Telepon</th>

                                            <th>Tanggal Lahir</th>
                                            <th>Nilai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="userTableBody">
                                        @foreach ($scores as $scores)
                                            <tr>
                                                <td>{{ $scores->name }}</td>
                                                <td>{{ $scores->username }}</td>
                                                <td>{{ $scores->email }}</td>
                                                <td>{{ $scores->telp }}</td>

                                                <td>{{ $scores->birthdate }}</td>
                                                <td>{{ $scores->score }}</td>
                                                <td>
                                                    <form action="{{ route('index.answer') }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" name="quiz_id" value="{{ Crypt::encryptString($quizId) }}">
                                                        <input type="hidden" name="users_id" value="{{ Crypt::encryptString($scores->users_id) }}">
                                                        <button type="submit" class="btn btn-warning">Lihat</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                </div>


                                <!-- Pagination -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUserModalLabel">ID Pertanyaan yang Dipilih</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('simpan.pertanyaan') }}" method="POST" id="questionForm">
                            @csrf
                            <!-- Menambahkan `quiz_id` sebagai input hidden -->
                            <input type="hidden" name="quiz_id" value="{{ $quizId }}">

                            <div id="selectedQuestionsList" class="modal-body">
                                <!-- ID Pertanyaan yang dipilih akan muncul di sini -->
                                <p id="noSelectionMessage" class="text-muted" style="display: none;">Tidak ada pertanyaan yang dipilih.</p>
                                <ul id="selectedQuestionIdsList"></ul> <!-- Daftar ID pertanyaan terpilih -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary" id="addQuestions">Tambah</button>
                            </div>
                        </form>

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
        let tableRows = document.querySelectorAll('#questionTableBody tr');

        tableRows.forEach(row => {
            // Ambil teks dari ID dan Pertanyaan
            let questionId = row.querySelector('.question-id').textContent.toLowerCase();
            let questionText = row.querySelector('.question-text').textContent.toLowerCase();

            // Periksa apakah teks dalam kolom ID atau Pertanyaan mengandung input pencarian
            if (questionId.includes(searchInput) || questionText.includes(searchInput)) {
                row.style.display = ''; // Tampilkan baris
            } else {
                row.style.display = 'none'; // Sembunyikan baris
            }
        });
    }
</script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const selectedQuestionsList = document.getElementById('selectedQuestionIdsList');
    const noSelectionMessage = document.getElementById('noSelectionMessage');
    const form = document.getElementById('questionForm');

    // Menambahkan event listener pada setiap checkbox pertanyaan
    document.querySelectorAll('.checkbox-item').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateSelectedQuestionsList();
        });
    });

    function updateSelectedQuestionsList() {
        selectedQuestionsList.innerHTML = '';
        selectedQuestionIds = Array.from(document.querySelectorAll('.checkbox-item:checked'))
            .map(checkbox => checkbox.getAttribute('data-id'));

        // Menghapus semua input 'questions[]' sebelumnya dari form
        form.querySelectorAll('input[name="questions[]"]').forEach(input => input.remove());

        if (selectedQuestionIds.length > 0) {
            noSelectionMessage.style.display = 'none';
            selectedQuestionIds.forEach(id => {
                // Buat elemen input tersembunyi
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'questions[]'; // Pastikan nama adalah 'questions[]'
                input.value = id;
                form.appendChild(input);

                // Tambahkan ID pertanyaan ke daftar di modal
                const li = document.createElement('li');
                li.textContent = `ID Pertanyaan: ${id}`;
                selectedQuestionsList.appendChild(li);
            });
        } else {
            noSelectionMessage.style.display = 'block';
        }
    }

    // Checkbox "Pilih Semua"
    const selectAllCheckbox = document.getElementById('selectAll');
    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function() {
            document.querySelectorAll('.checkbox-item').forEach(checkbox => checkbox.checked = this.checked);
            updateSelectedQuestionsList();
        });
    }
});

</script>


</body>

</html>
