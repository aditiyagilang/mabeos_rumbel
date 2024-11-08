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
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand ms-4" href="/dashboard">
                        <b class="logo-icon">
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="dark-logo" />
                        </b>
                        <span class="logo-text">
                            <img src="../assets/images/logo-light-text.png" alt="homepage" class="dark-logo" />
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-lg-none d-md-block ">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white "
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto mt-md-0 ">
                        <li class="nav-item search-box">
                            <a class="nav-link text-muted" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search" style="display: none;">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="/profile" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../assets/images/users/1.jpg" alt="user" class="profile-pic me-2">Markarn Doe
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/dashboard" aria-expanded="false"><i class="mdi me-2 mdi-gauge"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/profile" aria-expanded="false">
                                <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="mdi me-2 mdi-table"></i>
                                <span class="hide-menu">Tabel</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="/tabel-tipe" class="sidebar-link">
                                        <i class="mdi mdi-table-large"></i>
                                        <span class="hide-menu">Tabel Tipe</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/tabel-kuis" class="sidebar-link">
                                        <i class="mdi mdi-table-large"></i>
                                        <span class="hide-menu">Tabel Kuis</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/tabel-pertanyaan" class="sidebar-link">
                                        <i class="mdi mdi-table-large"></i>
                                        <span class="hide-menu">Tabel Pertanyaan</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/tabel-skor" class="sidebar-link">
                                        <i class="mdi mdi-table-large"></i>
                                        <span class="hide-menu">Tabel Skor</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/tabel-user" class="sidebar-link">
                                        <i class="mdi mdi-table-large"></i>
                                        <span class="hide-menu">Tabel Pengguna</span>
                                    </a>
                                </li>
                            </ul>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/login" aria-expanded="false">
                                    <i class="mdi me-2 mdi-logout"></i><span class="hide-menu">Logout</span>
                                </a>
                            </li>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
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
                                    <h4 class="card-title">Tabel Pengguna</h4>
                                    <div class="d-flex align-items-center">
                                        <input type="text" class="form-control me-2" placeholder="Cari..." id="searchInput">
                                            <button class="btn btn-outline-secondary" onclick="searchFunction()">
                                                <i class="bi bi-search"></i> <!-- Bootstrap Icons -->
                                            </button>
                                        <button class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#addUserModal">Tambah</button>
                                    </div>
                                </div>
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered table-hover table-striped user-table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Id Pengguna</th>
                                                <th>Nama Lengkap</th>
                                                <th>Username</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>No Hp</th>
                                                <th>Foto</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Prohaska</td>
                                                <td>Genelia</td>
                                                <td>11-11-2001</td>
                                                <td>@prohaska.gmail.com</td>
                                                <td>12345</td>
                                                <td>12345678910</td>
                                                <td>
                                                    <img src="../assets/images/users/1.jpg" alt="Foto Prohaska" width="50" height="50" class="rounded-circle">
                                                </td>
                                                <td>
                                                    <button class="btn btn-info me-2 mt-2" data-bs-toggle="modal" data-bs-target="#editUserModal">Ubah</button>
                                                    <button class="btn btn-danger me-2 mt-2" id="deleteData" onclick="confirmDelete()">Hapus</button>
                                                    <a href="/tabel-lihat-pertanyaan" class="btn btn-secondary mt-2">Detail</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Deshmukh</td>
                                                <td>Ritesh</td>
                                                <td>22-09-2002</td>
                                                <td>@ritesh.gmail.com</td>
                                                <td>54321</td>
                                                <td>10987654321</td>
                                                <td>
                                                    <img src="../assets/images/users/1.jpg" alt="Foto Prohaska" width="50" height="50" class="rounded-circle">
                                                </td>
                                                <td>
                                                    <button class="btn btn-info me-2 mt-2" data-bs-toggle="modal" data-bs-target="#editUserModal">Ubah</button>
                                                    <button class="btn btn-danger me-2 mt-2" id="deleteData" onclick="confirmDelete()">Hapus</button>
                                                    <a href="/tabel-lihat-pertanyaan" class="btn btn-secondary mt-2">Detail</a>
                                                </td>
                                            </tr>
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

            <!-- Modal Tambah -->
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUserModalLabel">Tambah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addUserForm">
                                <div class="mb-3">
                                    <label for="siswaName" class="form-label">ID Kuis</label>
                                    <input type="text" class="form-control" id="IdKuis" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kuisName" class="form-label">Nama Tipe</label>
                                    <input type="text" class="form-control" id="tipeName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="token" class="form-label">Nama Kuis</label>
                                    <input type="text" class="form-control" id="kuisName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="skor" class="form-label">Waktu Mulai</label>
                                    <input type="time" class="form-control" id="waktumulai" required>
                                </div>
                                <div class="mb-3">
                                    <label for="skor" class="form-label">Waktu Selesai</label>
                                    <input type="time" class="form-control" id="waktuselesai" required>
                                </div>
                                <div class="mb-3">
                                    <label for="skor" class="form-label">Token</label>
                                    <input type="text" class="form-control" id="token" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary dropdown-toggle d-flex align-items-center w-100" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span>Pilih Status</span>
                                            <i class="bi bi-chevron-down ms-2 ms-auto"></i> <!-- Ikon panah di sebelah teks -->
                                        </button>
                                        <ul class="dropdown-menu w-100" aria-labelledby="statusDropdown">
                                            <li><a class="dropdown-item" href="#">Mulai</a></li>
                                            <li><a class="dropdown-item" href="#">Berlangsung</a></li>
                                            <li><a class="dropdown-item" href="#">Selesai</a></li>
                                        </ul>
                                    </div>
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
                                    <label for="siswaName" class="form-label">ID Kuis</label>
                                    <input type="text" class="form-control" id="IdKuis" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kuisName" class="form-label">Nama Tipe</label>
                                    <input type="text" class="form-control" id="tipeName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="token" class="form-label">Nama Kuis</label>
                                    <input type="text" class="form-control" id="kuisName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="skor" class="form-label">Waktu Mulai</label>
                                    <input type="time" class="form-control" id="waktumulai" required>
                                </div>
                                <div class="mb-3">
                                    <label for="skor" class="form-label">Waktu Selesai</label>
                                    <input type="time" class="form-control" id="waktuselesai" required>
                                </div>
                                <div class="mb-3">
                                    <label for="skor" class="form-label">Token</label>
                                    <input type="text" class="form-control" id="token" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary dropdown-toggle d-flex align-items-center w-100" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span>Pilih Status</span>
                                            <i class="bi bi-chevron-down ms-2 ms-auto"></i> <!-- Ikon panah di sebelah teks -->
                                        </button>
                                        <ul class="dropdown-menu w-100" aria-labelledby="statusDropdown">
                                            <li><a class="dropdown-item" href="#">Mulai</a></li>
                                            <li><a class="dropdown-item" href="#">Berlangsung</a></li>
                                            <li><a class="dropdown-item" href="#">Selesai</a></li>
                                        </ul>
                                    </div>
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
</body>

</html>
