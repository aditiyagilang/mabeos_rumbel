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
                                <!-- <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Tabel Skor</h4>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">Tambah</button>
                                </div> -->
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered table-hover table-striped user-table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Siswa</th>
                                                <th>Nama Quiz</th>
                                                <th>Token</th>
                                                <th>Skor</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($scores as $index => $score)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $score->user->name }}</td> <!-- Nama pengguna -->
                                                    <td>{{ $score->quiz->quizs_name }}</td> <!-- Nama quiz -->
                                                    <td>{{ $score->quiz->token }}</td> <!-- Token pengguna -->
                                                    <td>{{ $score->score }}</td> <!-- Skor -->
                                                    <td>
                                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editUserModal"
                                                        data-id="{{ $score->scores_id }}"
                                                        data-siswa="{{ $score->user->name }}"
                                                        data-kuis="{{ $score->quiz->quizs_name }}"
                                                        data-token="{{ $score->quiz->token }}"
                                                        data-skor="{{ $score->score }}">
                                                        Ubah
                                                    </button>
                                                        <form action="{{ route('scores.destroy', $score->scores_id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
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
                            <h5 class="modal-title" id="addUserModalLabel">Tambah User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addUserForm">
                                <div class="mb-3">
                                    <label for="siswaName" class="form-label">Nama Siswa</label>
                                    <input type="text" class="form-control" id="siswaName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kuisName" class="form-label">Nama Kuis</label>
                                    <input type="text" class="form-control" id="kuisName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="token" class="form-label">Token</label>
                                    <input type="text" class="form-control" id="token" required>
                                </div>
                                <div class="mb-3">
                                    <label for="skor" class="form-label">Skor</label>
                                    <input type="text" class="form-control" id="skor" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel">Ubah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editUserForm">
                                <div class="mb-3">
                                    <label for="editSiswaName" class="form-label" >Nama Siswa</label>
                                    <input type="text" class="form-control" id="editSiswaName"disabled required>
                                </div>
                                <div class="mb-3">
                                    <label for="editKuisName" class="form-label">Nama Kuis</label>
                                    <input type="text" class="form-control" id="editKuisName"disabled required>
                                </div>
                                <div class="mb-3">
                                    <label for="editToken" class="form-label">Token</label>
                                    <input type="text" class="form-control" id="editToken" disabled required>
                                </div>
                                <div class="mb-3">
                                    <label for="editSkor" class="form-label">Skor</label>
                                    <input type="text" class="form-control" id="editSkor" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
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
    // Menangani event ketika tombol "Ubah" di klik
    $('#editUserModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Tombol yang diklik
        var siswaName = button.data('siswa'); // Mengambil nama siswa
        var kuisName = button.data('kuis'); // Mengambil nama kuis
        var token = button.data('token'); // Mengambil token
        var skor = button.data('skor'); // Mengambil skor
        var scoreId = button.data('id'); // Mengambil ID skor

        // Mengisi field di dalam modal dengan data yang diambil
        var modal = $(this);
        modal.find('#editSiswaName').val(siswaName);
        modal.find('#editKuisName').val(kuisName);
        modal.find('#editToken').val(token);
        modal.find('#editSkor').val(skor);

        // Menyimpan ID skor untuk referensi saat mengupdate
        modal.find('#editUserForm').data('id', scoreId);
    });

    // Menangani klik tombol Simpan
    $('.btn-primary').on('click', function() {
        var modal = $('#editUserModal');
        var scoreId = modal.find('#editUserForm').data('id');
        var siswaName = modal.find('#editSiswaName').val();
        var kuisName = modal.find('#editKuisName').val();
        var token = modal.find('#editToken').val();
        var skor = modal.find('#editSkor').val();

        // Kirim data ke server untuk memperbarui skor
        $.ajax({
            url: '/scores/' + scoreId, // URL untuk update skor
            type: 'PUT',
            data: {
                _token: '{{ csrf_token() }}',
                siswa_name: siswaName,
                kuis_name: kuisName,
                token: token,
                skor: skor
            },
            success: function(response) {
                // Menutup modal setelah berhasil memperbarui data
                modal.modal('hide');
                location.reload(); // Refresh halaman untuk menampilkan data yang baru
            },
            error: function(error) {
                alert('Terjadi kesalahan!');
            }
        });
    });
</script>

</body>

</html>
