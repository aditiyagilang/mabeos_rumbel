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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
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
                            <h4 class="card-title">Tabel Opsi Jawaban</h4>
                            <div class="d-flex align-items-center">
                                <input type="text" class="form-control me-2" placeholder="Cari Jawaban..." id="searchInput" onkeyup="searchFunction()">
                                <button class="btn btn-outline-secondary" onclick="searchFunction()">
                                    <i class="bi bi-search"></i> <!-- Bootstrap Icons -->
                                </button>

                                @if ($isFull)
                                    <!-- Jika sudah ada 5 data, tampilkan tulisan "Penuh" -->
                                    <span class="btn btn-warning ms-2">Penuh</span>
                                @else
                                    <!-- Jika belum ada 5 data, tampilkan tombol "Tambah" -->
                                    <button class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#addUserModal">Tambah</button>
                                @endif
                            </div>
</div>


                            <div class="table-responsive mt-3">
                                <table class="table table-bordered table-hover table-striped user-table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>ID Jawaban</th>
                                            <th>Jawaban</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="choosesTableBody">
                                        @foreach ($chooses as $index => $choose)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $choose->choose_id }}</td>
                                                <td class="answer">{{ $choose->answers }}</td>
                                                <td>
                                                    <!-- Aksi Edit -->
                                                    <a href="{{ route('choose.edit', ['id' => Crypt::encryptString($choose->choose_id)]) }}" class="btn btn-success me-2 mt-2" data-bs-toggle="modal" data-bs-target="#editUserModal">Ubah</a>

                                                    <!-- Aksi Hapus -->
                                                    <form action="{{ route('choose.destroy', ['id' => Crypt::encryptString($choose->choose_id)]) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger me-2 mt-2" onclick="return confirm('Apakah Anda yakin ingin menghapus jawaban ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah -->
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUserModalLabel">Tambah Jawaban</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addUserForm" method="POST" action="{{ route('choose.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="jawaban" class="form-label">Jawaban</label>
                                    <input type="text" class="form-control" id="jawaban" name="answers" required>
                                </div>
                                <input type="hidden" id="questions_id" name="questions_id" value="{{$questionId}}">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" form="addUserForm" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal Edit -->
            <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel">Ubah Jawaban</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk Edit -->
                            <form action="{{ route('choose.update', ['id' => Crypt::encryptString($choose->choose_id)]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="IdJawaban" class="form-label">Id Jawaban</label>
                                    <input type="text" class="form-control" id="IdJawaban" value="{{ $choose->choose_id }}" readonly required>
                                </div>
                                <div class="mb-3">
                                    <label for="jawaban" class="form-label">Jawaban</label>
                                    <input type="text" class="form-control" id="jawaban" name="answers" value="{{ $choose->answers }}" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="footer"> © 2021 Material Pro Admin by <a href="https://www.wrappixel.com/">wrappixel.com </a>
            </footer>
        </div>
    </div>
    <script>
    function searchFunction() {
        // Ambil nilai dari input pencarian
        let searchInput = document.getElementById('searchInput').value.toLowerCase();
        // Ambil semua baris tabel
        let tableRows = document.querySelectorAll('#choosesTableBody tr');

        tableRows.forEach(row => {
            // Ambil teks dari kolom Jawaban
            let answerText = row.querySelector('.answer').textContent.toLowerCase();

            // Periksa apakah input pencarian ditemukan di kolom Jawaban
            if (answerText.includes(searchInput)) {
                row.style.display = ''; // Tampilkan baris
            } else {
                row.style.display = 'none'; // Sembunyikan baris
            }
        });
    }
</script>
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
</body>

</html>
