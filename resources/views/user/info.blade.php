<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiz->quizs_name }} - Bimbel</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <div class="quiz-container">
              
                    <!-- Info Kuis -->
                 
                        <div class="exam-info">
                            <h2 class="exam-title">{{ $quiz->quizs_name }} </h2>
                            <p class="exam-detail">Tanggal Mulai: {{ $startDateFormatted }}</p>
                            <p class="exam-detail">Tanggal Selesai: {{ $endDateFormatted }}</p>
                            <p class="exam-detail">Durasi: {{ \Carbon\Carbon::parse($quiz->duration)->format('H:i') }}</p>


                            <p class="exam-detail">Jumlah Soal: {{ $questionCount }}</p>
                        </div>
                  

                    <!-- Button Mulai dan Kembali -->
                    <div class="formbold-btn-wrapper">
                        <button type="button" class="formbold-btn" id="backBtn" onclick="window.history.back()">Kembali</button>
                        <form action="{{ route('answer.startQuiz') }}" method="POST">
                            @csrf
                            <input type="hidden" name="quizs_id" value="{{ $quiz->quizs_id }}">
                            <input type="hidden" name="duration" value="{{ $quiz->duration }}">
                            <button type="submit" class="formbold-btn">Mulai</button>
                        </form>

                    </div>
               
            </div>
        </div>
    </div>

    <script>
        function startQuiz() {
            // Redirect to the quiz start page or load the quiz questions
            window.location.href = '/quiz/start';  // Update with the correct quiz starting URL
        }
    </script>
</body>
</html>
