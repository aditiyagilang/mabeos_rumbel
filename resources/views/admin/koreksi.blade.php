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
                                    <input type="text" class="form-control me-2" placeholder="Cari Pertanyaan, Jenis Soal, atau Jawaban..." id="searchInput" onkeyup="searchFunction()">
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
                                        <th>Pertanyaan</th>
                                        <th>Jawaban Benar</th>
                                        <th>Jawaban User</th>
                                        <th>Score</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="questionsTableBody">
                                    @foreach($answers as $index => $answer)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td class="question-text">{{ $answer->question }}</td>
                                            <td class="question-answer">{{ $answer->correct_answer }}</td>
                                            <td class="user-answer">{{ $answer->answers }}</td> 
                                            <td class="score">{{ $answer->score }}</td> 
                                            <td>
                                                <!-- Aksi jika diperlukan -->
                                                <td class="score">
                                                <!-- Form untuk toggle score -->
                                                <form action="{{ route('answers.toggleScore') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="answers_id" value="{{ $answer->answers_id }}">
                                                            <button type="submit" class="btn btn-link p-0">
                                                                @if($answer->score == 0)
                                                                    <i class="bi bi-check-circle text-success"></i>
                                                                @else
                                                                    <i class="bi bi-x-circle text-danger"></i>
                                                                @endif
                                                            </button>
                                                        </form>
                                            </td>


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
        let tableRows = document.querySelectorAll('#questionsTableBody tr');
        
        tableRows.forEach(row => {
            // Ambil teks dari kolom ID Pertanyaan, Jenis Soal, Pertanyaan, dan Jawaban
            let questionId = row.querySelector('.question-id').textContent.toLowerCase();
            let questionType = row.querySelector('.question-type').textContent.toLowerCase();
            let questionText = row.querySelector('.question-text').textContent.toLowerCase();
            let questionAnswer = row.querySelector('.question-answer').textContent.toLowerCase();
            
            // Periksa apakah input pencarian ditemukan di salah satu kolom
            if (questionId.includes(searchInput) || questionType.includes(searchInput) || questionText.includes(searchInput) || questionAnswer.includes(searchInput)) {
                row.style.display = ''; // Tampilkan baris
            } else {
                row.style.display = 'none'; // Sembunyikan baris
            }
        });
    }
</script>
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
