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
    <link href="{{ 'assets/css/style.min.css' }}" rel="stylesheet"/>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
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
                                    <h4 class="card-title">Tabel Kuis</h4>
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
                                                <th>No</th>
                                                <th>ID Pertanyaan</th>
                                                <th>Jenis Soal</th>
                                                <th>Pertanyaan</th>
                                                <th>Jawaban</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($questions as $index => $question)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $question->questions_id }}</td>
                                                    <td>{{ $question->type }}</td>
                                                    <td>{{ $question->questions }}</td>
                                                    <td>{{ $question->answers }}</td>
                                                    <td>
                                                    <!-- Tombol untuk membuka modal Edit Question -->
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editQuestionModal"
                                                        data-id="{{ $question->questions_id }}"
                                                        data-pertanyaan="{{ $question->questions }}"
                                                        data-jawaban="{{ $question->answers }}"
                                                        data-type="{{ $question->type }}"
                                                        data-hash="{{ Crypt::encryptString($question->questions_id) }}">
                                                        Edit
                                                    </button>




                                                        <!-- Hapus -->
                                                        <form action="{{ route('questions.destroy', $question->questions_id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger me-2">Hapus</button>
                                                        </form>

                                                        <!-- Detail -->
                                                        <a href="{{ route('choose.index', ['questions_id' => Crypt::encryptString($question->questions_id)]) }}" class="btn btn-secondary">Detail</a>

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

            <!-- Modal Tambah -->
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUserModalLabel">Tambah Pertanyaan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addUserForm" action="{{ route('questions.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="type" class="form-label">Tipe Pertanyaan</label>
                                    <select class="form-control" id="type" name="type" required>
                                        <option value="" disabled selected>Pilih Tipe</option>
                                        <option value="choose">Choose</option>
                                        <option value="multiple choose">Multiple Choose</option>
                                        <option value="essay">Essay</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                    <input type="text" class="form-control" id="pertanyaan" name="questions" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jawaban" class="form-label">Jawaban</label>
                                    <input type="text" class="form-control" id="jawaban" name="answers" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" form="addUserForm">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal untuk Edit Question -->
            <div class="modal fade" id="editQuestionModal" tabindex="-1" aria-labelledby="editQuestionModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editQuestionModalLabel">Edit Question</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form Edit Question -->
                            <form id="editQuestionForm" action="{{ route('questions.update', '1') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="editQuestionId" class="form-label">Question ID</label>
                                    <input type="text" class="form-control" id="editQuestionId" name="question_id" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="editQuestion" class="form-label">Question</label>
                                    <input type="text" class="form-control" id="editQuestion" name="questions" required> <!-- Sesuaikan dengan nama validasi -->
                                </div>
                                <div class="mb-3">
                                    <label for="editAnswer" class="form-label">Answer</label>
                                    <input type="text" class="form-control" id="editAnswer" name="answers" required> <!-- Sesuaikan dengan nama validasi -->
                                </div>
                                <div class="mb-3">
                                    <label for="editQuestionType" class="form-label">Question Type</label>
                                    <select class="form-select" id="editQuestionType" name="question_type" required>
                                        <option value="choose">Choose</option>
                                        <option value="multiple choose">Multiple Choose</option>
                                        <option value="essay">Essay</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
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
    const editModal = document.getElementById('editQuestionModal');
    editModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget; // Tombol yang diklik
        var questionId = button.getAttribute('data-id'); // ID soal
        var questionText = button.getAttribute('data-pertanyaan'); // Pertanyaan
        var answer = button.getAttribute('data-jawaban'); // Jawaban
        var questionType = button.getAttribute('data-type'); // Tipe soal
        var hash = button.getAttribute('data-hash'); // Ambil hash dari data-hash yang sudah dienkripsi

        // Isi form dengan data
        var form = document.getElementById('editQuestionForm');
        form.action = '/questions/' + hash; // Update action form dengan URL yang benar
        document.getElementById('editQuestionId').value = questionId; // Isi input ID soal
        document.getElementById('editQuestion').value = questionText; // Isi input pertanyaan
        document.getElementById('editAnswer').value = answer; // Isi input jawaban

        // Set value dropdown 'editQuestionType' berdasarkan tipe soal yang dipilih
        var selectType = document.getElementById('editQuestionType');

        // Gunakan if selected untuk memilih nilai dropdown berdasarkan tipe soal
        if (questionType === 'choose') {
            selectType.value = 'choose'; // Set value 'choose'
        } else if (questionType === 'multiple choose') {
            selectType.value = 'multiple choose'; // Set value 'multiple choose'
        } else if (questionType === 'essay') {
            selectType.value = 'essay'; // Set value 'essay'
        } else {
            selectType.value = ''; // Set default jika tidak ada tipe yang cocok
        }
    });
</script>




</body>

</html>
