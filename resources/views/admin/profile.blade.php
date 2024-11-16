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

        @if (session('level') === 'Admin')
            @include('admin.sidebar')
        @else (session('level') === 'User')
            @include('user.sidebar')
        @endif
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Profile</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body profile-card">
                            <center class="mt-4">
                            <form action="{{ route('user.updatePhoto') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Input file untuk memilih foto -->
                            <input type="file" id="uploadPhoto" name="photo" accept="image/*" style="display: none;" onchange="previewPhoto(event)" />
                            
                            <!-- Tampilan foto -->
                            <div class="photo-container" onclick="document.getElementById('uploadPhoto').click();">
                                <img id="profilePhoto" src="{{ asset($user->img_url) }}" alt="Click to change photo" width="150" height="150"/>
                                <div class="overlay">
                                    <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                    <p>Click to change photo</p>
                                </div>
                            </div>
                            
                            <!-- Tombol submit untuk mengirim foto -->
                            <button type="submit">Upload Photo</button>
                        </form>
                                    <h4 class="card-title mt-2">{{ $user->name }}</h4>
                                    <h6 class="card-subtitle">{{ $user->level }}</h6>
                                </center>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <h2 class="card-title">Ganti Password</h2>
                                <form class="form-horizontal form-material mx-2" method="POST" action="{{ route('user.updatePassword') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Password Sebelumnya</label>
                                        <div class="col-md-12">
                                            <input type="password" name="current_password" class="form-control ps-0 form-control-line" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Password Baru</label>
                                        <div class="col-md-12">
                                            <input type="password" name="new_password" class="form-control ps-0 form-control-line" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Konfirmasi Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="new_password_confirmation" class="form-control ps-0 form-control-line" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                            <form class="form-horizontal form-material mx-2" method="POST" action="{{ route('user.updateProfile') }}">
                                @csrf
                                <h2 class="card-title">Ubah Profile</h2>
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">Nama Lengkap</label>
                                    <div class="col-md-12">
                                        <input type="text" name="name" class="form-control ps-0 form-control-line" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">Username</label>
                                    <div class="col-md-12">
                                        <input type="text" name="username" class="form-control ps-0 form-control-line" value="{{ $user->username }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Tanggal Lahir</label>
                                    <div class="col-md-12">
                                        <input type="date" name="birthdate" class="form-control ps-0 form-control-line" value="{{ \Carbon\Carbon::parse($user->birthdate)->format('Y-m-d') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" name="email" class="form-control ps-0 form-control-line" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" name="telp" class="form-control ps-0 form-control-line" value="{{ $user->telp }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 d-flex">
                                        <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Update Profile</button>
                                    </div>
                                </div>
                            </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <footer class="footer"> © 2021 Material Pro Admin by <a href="https://www.wrappixel.com/">wrappixel.com </a>
            </footer>
        </div>
    </div>

    <script>
        function previewAndUploadPhoto(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];
            
            if (!file) return;

            // Pratinjau Foto
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profilePhoto');
                output.src = reader.result;
            };
            reader.readAsDataURL(file);

            // Kirim Foto ke Server
            const formData = new FormData();
            formData.append('photo', file);

            fetch('{{ route("user.updatePhoto") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('profilePhoto').src = data.img_url;
                    alert('Photo updated successfully.');
                } else {
                    alert('Failed to update photo.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
    <script src="{{ 'assets/js/jquery.min.js' }}"></script>
    <script src="{{ 'assets/js/bootstrap.bundle.min.js' }}"></script>
    <script src="{{ 'assets/js/app-style-switcher.js' }}"></script>
    <script src="{{ 'assets/js/waves.js' }}"></script>
    <script src="{{ 'assets/js/sidebarmenu.js' }}"></script>
    <script src="{{ 'assets/js/custom.js' }}"></script>
</body>

</html>
