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
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">Tambah</button>
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
                                        <tbody>
                                            @foreach($quizzes as $index => $quiz)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $quiz->quizs_id }}</td>
                                                    <td>{{ $quiz->type->types_name ?? 'N/A' }}</td>
                                                    <td>{{ $quiz->quizs_name }}</td>
                                                    <td>{{ $quiz->start_date }}</td>
                                                    <td>{{ $quiz->end_date }}</td>
                                                    <td>{{ $quiz->token }}</td>
                                                    <td>{{ $quiz->status }}</td>
                                                    <td>
                                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editUserModal"
                                                        data-id="{{ $quiz->quizs_id }}"
                                                        data-name="{{ $quiz->quizs_name }}"
                                                        data-type-id="{{ $quiz->types_id }}"
                                                        data-start-date="{{ $quiz->start_date }}"
                                                        data-end-date="{{ $quiz->end_date }}"
                                                        data-token="{{ $quiz->token }}"
                                                        data-status="{{ $quiz->status }}">Edit</button>



                                                        <form action="{{ route('quizzes.destroy', Crypt::encryptString($quiz->quizs_id)) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger me-2">Hapus</button>
                                                        </form>
                                                        <form action="{{ route('details.index') }}" method="GET" style="display:inline;">
                                                            <input type="hidden" name="qid" value="{{ Crypt::encryptString($quiz->quizs_id) }}">
                                                            <button type="submit" class="btn btn-secondary">Detail</button>
                                                        </form>
                                                    @else
                                                        <span>Tidak ada aksi untuk Kuis Kecermatan</span>
                                                    @endif
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

            <!-- Modal Tambah -->
           <!-- Modal Edit Kuis -->
           <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Ubah Kuis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('quizzes.update', ':quizs_id') }}" method="POST" id="editUserForm">
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="editIdKuis" name="quizs_id">

                    <!-- Tipe Kuis -->
                    <div class="mb-3">
                        <label for="types_id" class="form-label">Nama Tipe</label>
                        <select class="form-control" id="types_id" name="types_id" required>
                            <option value="" disabled selected>Pilih Tipe</option>
                            @foreach($types as $type)
                                <option value="{{ $type->types_id }}">{{ $type->types_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Nama Kuis -->
                    <div class="mb-3">
                        <label for="editKuisName" class="form-label">Nama Kuis</label>
                        <input type="text" class="form-control" id="editKuisName" name="quizs_name" required>
                    </div>

                    <!-- Waktu Mulai -->
                    <div class="mb-3">
                        <label for="editWaktuMulai" class="form-label">Waktu Mulai</label>
                        <input type="datetime-local" class="form-control" id="editWaktuMulai" name="start_date" required>
                    </div>

                    <!-- Waktu Selesai -->
                    <div class="mb-3">
                        <label for="editWaktuSelesai" class="form-label">Waktu Selesai</label>
                        <input type="datetime-local" class="form-control" id="editWaktuSelesai" name="end_date" required>
                    </div>

                    <!-- Token -->
                    <div class="mb-3">
                        <label for="editToken" class="form-label">Token</label>
                        <input type="text" class="form-control" id="editToken" name="token" required>
                    </div>

                    <!-- Dropdown Status -->
                    <div class="mb-3">
                        <label for="editStatus" class="form-label">Status</label>
                        <select class="form-control" id="editStatus" name="status" required>
                        <option value="start" {{ $quiz->status == 'start' ? 'selected' : '' }}>Start</option>
                        <option value="on going" {{ $quiz->status == 'on going' ? 'selected' : '' }}>On Going</option>
                        <option value="end" {{ $quiz->status == 'end' ? 'selected' : '' }}>End</option>

                        </select>
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


   <!-- Modal Tambah -->
   <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUserModalLabel">Tambah Kuis</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addUserForm" action="{{ route('quizzes.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="quizs_name" class="form-label">Nama Kuis</label>
                                    <input type="text" class="form-control" id="quizs_name" name="quizs_name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="types_id" class="form-label">Nama Tipe</label>
                                    <select class="form-control" id="types_id" name="types_id" required>
                                        <option value="" disabled selected>Pilih Tipe</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->types_id }}">{{ $type->types_id }} - {{ $type->types_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Waktu Mulai</label>
                                    <input type="datetime-local" class="form-control" id="start_date" name="start_date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">Waktu Selesai</label>
                                    <input type="datetime-local" class="form-control" id="end_date" name="end_date" required>
                                </div>



                                <!-- Status dengan input hidden -->
                                <input type="hidden" id="status" name="status" value="start">
                                <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" form="addUserForm" class="btn btn-primary">Simpan</button>
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
