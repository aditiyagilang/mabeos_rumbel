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
                                    <h4 class="card-title">Tabel Tipe</h4>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTypeModal">Tambah</button>
                                </div>
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered table-hover table-striped user-table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>ID Tipe</th>
                                                <th>Nama Tipe</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($types as $index => $type)
                                                <tr>
                                                <td>{{ intval($index) + 1 }}</td>

                                                    <td>{{ $type->types_id }}</td>
                                                    <td>{{ $type->types_name }}</td>
                                                    <td>
                                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editTypeModal"
                                                        data-id="{{ $type->types_id }}" data-name="{{ $type->types_name }}">
                                                        Ubah
                                                    </button>
                                                                <form action="{{ route('types.destroy', $type->hash) }}" method="POST">
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
           <!-- Modal Edit -->
           <div class="modal fade" id="addTypeModal" tabindex="-1" aria-labelledby="addTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTypeModalLabel">Tambah Tipe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('types.store') }}" method="POST" id="addTypeForm">
                    @csrf
                    <!-- Form untuk menambah tipe baru -->
                    <div class="mb-3">
                        <label for="tipeName" class="form-label">Nama Tipe</label>
                        <input type="text" class="form-control" id="tipeName" name="types_name" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" form="addTypeForm" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="editTypeModal" tabindex="-1" aria-labelledby="editTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTypeModalLabel">Ubah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('types.update', '1') }}" method="POST" id="editTypeForm">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="typeId" class="form-label">ID Tipe</label>
                        <input type="text" class="form-control" id="typeId" name="typeId" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tipeName" class="form-label">Nama Tipe</label>
                        <input type="text" class="form-control" id="tipeName" name="types_name" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" form="editTypeForm" class="btn btn-primary">Simpan</button>
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
    const editModal = document.getElementById('editTypeModal');
    editModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget; // Tombol yang diklik
        var id = button.getAttribute('data-id'); // ID tipe
        var name = button.getAttribute('data-name'); // Nama tipe

        // Isi form dengan data
        var form = document.getElementById('editTypeForm');
        form.action = '/types/' + id; // Update action form dengan URL yang benar
        document.getElementById('typeId').value = id; // Isi input ID
        document.getElementById('tipeName').value = name; // Isi input Nama
    });
</script>
<script>
    // Ketika tombol Edit diklik
    $('#editTypeModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Tombol yang diklik
        var typeId = button.data('id'); // Mengambil data-id dari tombol
        var typeName = button.data('name'); // Mengambil data-name dari tombol

        // Mengisi nilai input modal dengan data yang diambil
        var modal = $(this);
        modal.find('#typeId').val(typeId); // Mengisi ID tipe ke input yang readonly
        modal.find('#tipeName').val(typeName); // Mengisi Nama tipe ke input
    });
</script>


</body>

</html>
