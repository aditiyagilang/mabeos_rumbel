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
    <div class="formbold-main-wrapper">
        <div class="sidebar-card">
            <div class="time-container">
                <h3>Waktu Pengerjaan</h3>
                <div id="timer">00:00</div>
            </div>
            <div id="question-indicator" class="question-indicator">
                <h3>Soal</h3>
                <!-- Kotak indikator soal akan diisi otomatis oleh JavaScript -->
            </div>
        </div>
        <div class="formbold-form-wrapper">
            <div class="exam-info">
                <h2 class="exam-title">Kuis CPNS</h2>
                <p class="exam-detail">Tanggal Mulai: 20 November 2024</p>
                <p class="exam-detail">Tanggal Selesai: 21 November 2024</p>
                <p class="exam-detail">Durasi: 60 Menit</p>
                <p class="exam-detail">Jumlah Soal: 10</p>
            </div>
            <div class="quiz-container">
                <form id="quizForm" action="https://formbold.com/s/FORM_ID" method="POST">
                    <!-- Nama -->
                    <div class="form-step active">
                        <label for="token" class="formbold-form-label">Token</label>
                        <input type="text" name="token" id="token" placeholder="xxx" class="formbold-form-input"/>
                    </div>

                    <!-- Soal 1 -->
                    <div class="form-step soal">
                        <label for="qusOne" class="formbold-form-label" id="question1">
                            All HTML code must be put between which symbols?
                        </label>
                        <div class="formbold-radio-flex">
                            <div class="formbold-radio-group">
                                <label class="formbold-radio-label">
                                    <input class="formbold-input-radio" type="radio" name="qusOne" id="qusOne" />
                                    Option one
                                    <span class="formbold-radio-checkmark"></span>
                                </label>
                            </div>
                            <div class="formbold-radio-group">
                                <label class="formbold-radio-label">
                                    <input class="formbold-input-radio" type="radio" name="qusOne" id="qusOne" />
                                    Option Two
                                    <span class="formbold-radio-checkmark"></span>
                                </label>
                            </div>
                            <div class="formbold-radio-group">
                                <label class="formbold-radio-label">
                                    <input class="formbold-input-radio" type="radio" name="qusOne" id="qusOne" />
                                    Option Three
                                    <span class="formbold-radio-checkmark"></span>
                                </label>
                            </div>
                            <div class="formbold-radio-group">
                                <label class="formbold-radio-label">
                                    <input class="formbold-input-radio" type="radio" name="qusOne" id="qusOne" />
                                    None of them
                                    <span class="formbold-radio-checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Soal 2 -->
                    <div class="form-step soal">
                        <label for="qusTwo" class="formbold-form-label" id="question2">
                            To display an image on web, which tag is used?
                        </label>
                        <div class="formbold-radio-flex">
                            <div class="formbold-radio-group">
                                <label class="formbold-radio-label">
                                    <input class="formbold-input-radio" type="radio" name="qusTwo" id="qusTwo" />
                                    Option one
                                    <span class="formbold-radio-checkmark"></span>
                                </label>
                            </div>
                            <div class="formbold-radio-group">
                                <label class="formbold-radio-label">
                                    <input class="formbold-input-radio" type="radio" name="qusTwo" id="qusTwo" />
                                    Option Two
                                    <span class="formbold-radio-checkmark"></span>
                                </label>
                            </div>
                            <div class="formbold-radio-group">
                                <label class="formbold-radio-label">
                                    <input class="formbold-input-radio" type="radio" name="qusTwo" id="qusTwo" />
                                    Option Three
                                    <span class="formbold-radio-checkmark"></span>
                                </label>
                            </div>
                            <div class="formbold-radio-group">
                                <label class="formbold-radio-label">
                                    <input class="formbold-input-radio" type="radio" name="qusTwo" id="qusTwo" />
                                    None of them
                                    <span class="formbold-radio-checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Soal 3 -->
                    <div class="form-step soal">
                        <label for="essayQuestion" class="formbold-form-label" id="question3">
                            Describe what HTML is used for?
                        </label>
                        <textarea id="essayQuestion" name="essayQuestion" class="formbold-form-input" rows="4" placeholder="Write your answer here..."></textarea>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="formbold-btn-wrapper">
                        <button type="button" class="formbold-btn" id="backBtn" onclick="prevStep()">Back</button>
                        <button type="button" class="formbold-btn" id="nextBtn" onclick="nextStep()">Next</button>
                        <button type="submit" class="formbold-btn" id="submitBtn" style="display: none;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const steps = document.querySelectorAll(".form-step");
        const soalSteps = document.querySelectorAll(".form-step.soal");
        const sidebarCard = document.querySelector(".sidebar-card");
        let currentStep = 0;
        let timeElapsed = 0;

        // Function to add question numbers dynamically
        function addQuestionNumbers() {
            soalSteps.forEach((step, index) => {
                const questionLabel = step.querySelector('label');
                const originalText = questionLabel.textContent.trim();
                questionLabel.innerHTML = `${index + 1}. ${originalText}`;
            });
        }

        // Call the function to add numbers to questions on page load
        addQuestionNumbers();

        // Create question indicators
        const questionIndicator = document.getElementById("question-indicator");
        soalSteps.forEach((_, index) => {
            const box = document.createElement("div");
            box.className = "question-box";
            box.textContent = index + 1;
            box.onclick = () => goToQuestion(index);
            questionIndicator.appendChild(box);
        });

        function updateTimer() {
            timeElapsed++;
            const minutes = String(Math.floor(timeElapsed / 60)).padStart(2, "0");
            const seconds = String(timeElapsed % 60).padStart(2, "0");
            document.getElementById("timer").textContent = `${minutes}:${seconds}`;
        }

        setInterval(updateTimer, 1000);

        function showStep(step) {
            steps.forEach((element, index) => {
                element.classList.toggle("active", index === step);
            });

            sidebarCard.style.display = step > 0 ? "block" : "none";
            document.querySelector(".exam-info").style.display = step === 0 ? "block" : "none";

            document.getElementById("submitBtn").style.display = step === steps.length - 1 ? "block" : "none";
            document.getElementById("nextBtn").style.display = step === steps.length - 1 ? "none" : "block";
            document.getElementById("backBtn").style.display = step === 0 ? "none" : "block";

            document.querySelectorAll(".question-box").forEach((box, idx) => {
                box.classList.toggle("active", idx === step - 1);
            });
        }

        function nextStep() {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        }

        function goToQuestion(index) {
            currentStep = index + 1;
            showStep(currentStep);
        }

        showStep(currentStep);
    </script>
</body>
</html>
