<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Halaman Ujian</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    
    <div class="formbold-main-wrapper">
        <div class="sidebar-card">
            <div class="time-container">
                <h3>Waktu Pengerjaan</h3>
                <div id="timer">00:00</div>
            </div>
            <div id="question-indicator" class="question-indicator">
                <h3>Soal</h3>
                <ul>
                    @foreach ($questionsWithChoices->sortBy('questions_id') as $index => $question)
                        <li id="indicator-{{ $index }}" class="indicator" onclick="navigateToQuestion({{ $index }})">
                            {{ $index + 1 }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="formbold-form-wrapper">
        <form id="quizForm" method="POST">
            @csrf
            <div id="quiz-container"></div>
            <div class="formbold-btn-wrapper">
                <button type="button" class="formbold-btn" id="prevBtn" onclick="prevQuestion()">Sebelumnya</button>
                <button type="button" class="formbold-btn" id="nextBtn" onclick="nextQuestion()">Berikutnya</button>
               
            </div>
        </form>
        <form id="quizForm" method="POST" action="{{ route('quiz.finish') }}">
                    @csrf
                    <input type="hidden" name="quizs_id" value="{{ $quizs_id }}">
                    <button type="submit" class="formbold-btn" id="finishBtn">Selesai</button>
                </form>

        </div>
    </div>

    <script>
    const questions = @json($questionsWithChoices);
    const durationString = @json($duration);
    const durationParts = durationString.split(':');
    const durationInSeconds = (parseInt(durationParts[0], 10) * 3600) + (parseInt(durationParts[1], 10) * 60) + parseInt(durationParts[2], 10);

    let timer = localStorage.getItem('timer') ? parseInt(localStorage.getItem('timer')) : durationInSeconds;
    let currentQuestionIndex = localStorage.getItem('currentQuestionIndex') ? parseInt(localStorage.getItem('currentQuestionIndex')) : 0;

    function startTimer() {
        const timerElement = document.getElementById('timer');

        if (isNaN(timer) || timer <= 0) {
            console.error("Invalid timer value:", timer);
            return;
        }

        const timerInterval = setInterval(() => {
            if (timer <= 0) {
                clearInterval(timerInterval);
                finishQuiz();
            } else {
                timer--;
                localStorage.setItem('timer', timer); // Simpan timer ke localStorage
                const hours = Math.floor(timer / 3600);
                const minutes = Math.floor((timer % 3600) / 60);
                const seconds = timer % 60;

                const timeString = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
                timerElement.textContent = timeString;
            }
        }, 1000);
    }

    function showQuestion(index) {
        const quizContainer = document.getElementById('quiz-container');
        const question = questions[index];

        let html = `<h3>${index + 1}. ${question.questions}</h3>`;

        if (question.type === 'choose') {
            if (question.choices && question.choices.length > 0) {
                html += question.choices.map(choice => {
                    const savedAnswer = question.user_answer;
                    const checked = savedAnswer == choice.answers ? 'checked' : '';
                    return `
                        <li>
                            <label>
                                <input type="radio" name="question_${question.questions_id}" value="${choice.answers}" ${checked} onchange="saveAnswer(${question.questions_id}, this.value)">
                                ${choice.answers}
                            </label>
                        </li>
                    `;
                }).join('');
            }
        } else if (question.type === 'essay') {
            const savedAnswer = question.user_answer;
            html += `
                <textarea name="answer_${question.questions_id}" onchange="saveAnswer(${question.questions_id}, this.value)" rows="4" placeholder="Tulis jawaban di sini">${savedAnswer || ''}</textarea>
            `;
        }

        quizContainer.innerHTML = html;

        // Update indicator untuk soal yang sedang aktif
        document.querySelectorAll('.indicator').forEach(el => el.classList.remove('active'));
        document.getElementById(`indicator-${index}`).classList.add('active');
    }

    function saveAnswer(answers_id, value) {
        const answer = value;
        sendAnswerToBackend(answers_id, answer);
    }

    function sendAnswerToBackend(answers_id, answer) {
        if (!answer) {
            console.error("Jawaban tidak ditemukan!");
            return;
        }
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch("{{ route('quiz.updateAnswers') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                question_id: answers_id,
                answer: answer
            }),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(response.json());
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            if (data.message === 'Jawaban berhasil diperbarui') {
                console.log('Updated');
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }

    
    document.addEventListener('DOMContentLoaded', () => {
    showQuestion(currentQuestionIndex);
    startTimer();
    checkFinishButtonVisibility();  // Periksa visibilitas tombol 'Selesai'
});
function nextQuestion() {
    const currentQuestion = questions[currentQuestionIndex];
    const selectedAnswer = getSelectedAnswer(currentQuestion.questions_id);

    if (!selectedAnswer) {
        alert("Pilih jawaban terlebih dahulu.");
        return;
    }

    sendAnswerToBackend(currentQuestion.questions_id, selectedAnswer);

    if (currentQuestionIndex < questions.length - 1) {
        currentQuestionIndex++;
        showQuestion(currentQuestionIndex);
        localStorage.setItem('currentQuestionIndex', currentQuestionIndex); // Simpan ke localStorage
    }

    checkFinishButtonVisibility();  // Periksa visibilitas tombol 'Selesai' setelah pindah soal
}


function prevQuestion() {
    if (currentQuestionIndex > 0) {
        currentQuestionIndex--;
        showQuestion(currentQuestionIndex);
        localStorage.setItem('currentQuestionIndex', currentQuestionIndex); // Simpan ke localStorage
    }

    checkFinishButtonVisibility();  // Periksa visibilitas tombol 'Selesai' setelah pindah soal
}


    function getSelectedAnswer(question_id) {
        const questionElement = document.querySelector(`input[name="question_${question_id}"]:checked`);
        if (questionElement) {
            return questionElement.value;
        } else {
            const textarea = document.querySelector(`textarea[name="answer_${question_id}"]`);
            return textarea ? textarea.value : '';
        }
    }

    function navigateToQuestion(index) {
        currentQuestionIndex = index;
        showQuestion(index);
        localStorage.setItem('currentQuestionIndex', currentQuestionIndex); // Simpan ke localStorage
    }

    
function checkFinishButtonVisibility() {
    const finishButton = document.getElementById('finishBtn');
    
    // Tampilkan tombol 'Selesai' hanya jika berada di soal terakhir
    if (currentQuestionIndex === questions.length - 1) {
        finishButton.style.display = 'inline-block';  // Tampilkan tombol
    } else {
        finishButton.style.display = 'none';  // Sembunyikan tombol
    }
}
    document.addEventListener('DOMContentLoaded', () => {
        showQuestion(currentQuestionIndex);
        startTimer();
    });
</script>

</body>
</html>
