<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bimbel</title>
    <link rel="stylesheet" href="{{ 'assets/css/style.css' }}">
</head>
<body>
@if (session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif

    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <div class="quiz-container">
                @if (session('success'))
                    <div class="alert alert-success">
                        <p>{{ session('success') }}</p>
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <!-- Form untuk Input Token -->
                <form action="{{ route('validate.token') }}" method="POST" id="tokenForm">
                    @csrf
                    <div class="form-step active">
                        <label for="token" class="formbold-form-label">Token</label>
                        <input type="text" name="token" id="token" placeholder="xxx" class="formbold-form-input"/>
                    </div>

                    <div class="formbold-btn-wrapper">
                        <!-- Tombol Submit -->
                        <button type="submit" id="submitBtn" class="formbold-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
