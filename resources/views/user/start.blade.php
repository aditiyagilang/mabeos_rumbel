<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian Dimulai</title>
</head>
<body>
    <div class="container">
        <h3>{{ session('quiz.title') }}</h3>
        <p>Waktu yang tersisa: <span id="timer"></span></p>
        
        @foreach($questions as $question)
            <div>
                <p>{{ $question->question_text }}</p>
                @foreach($question->answers as $answer)
                    <button>{{ $answer }}</button>
                @endforeach
            </div>
        @endforeach

        <form action="{{ route('quiz.submit') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
        </form>
    </div>

    <script>
        // Timer logic
        let duration = {{ session('quiz.duration') }};
        let timerElement = document.getElementById("timer");
        setInterval(() => {
            if (duration > 0) {
                duration--;
                let minutes = Math.floor(duration / 60);
                let seconds = duration % 60;
                timerElement.innerText = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            }
        }, 1000);
    </script>
</body>
</html>
