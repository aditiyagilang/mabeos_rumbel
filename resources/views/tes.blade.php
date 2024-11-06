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
        <div class="formbold-form-wrapper">
            <img src="https://primaindisoft.com/blog/wp-content/uploads/2018/10/header-SMP-Sept.jpg">
            <form id="quizForm" action="https://formbold.com/s/FORM_ID" method="POST">
                <!-- Nama -->
                <div class="form-step active">
                    <label for="firstname" class="formbold-form-label">Nama Lengkap</label>
                    <input type="text" name="firstname" id="firstname" placeholder="Jane" class="formbold-form-input"/>
                </div>

                <!-- Kelas -->
                <div class="form-step">
                    <label for="lastname" class="formbold-form-label">Kelas</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Cooper" class="formbold-form-input"/>
                </div>

                <!-- Soal 1 -->
                <div class="form-step soal">
                    <label for="qusOne" class="formbold-form-label">
                        All HTML code must be put between which symbols?
                    </label>
                    <div class="formbold-radio-flex">
                        <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                              <input
                                class="formbold-input-radio"
                                type="radio"
                                name="qusOne"
                                id="qusOne"
                              />
                              Option one
                              <span class="formbold-radio-checkmark"></span>
                            </label>
                          </div>

                          <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                              <input
                                class="formbold-input-radio"
                                type="radio"
                                name="qusOne"
                                id="qusOne"
                              />
                              Option Two
                              <span class="formbold-radio-checkmark"></span>
                            </label>
                          </div>

                          <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                              <input
                                class="formbold-input-radio"
                                type="radio"
                                name="qusOne"
                                id="qusOne"
                              />
                              Option Three
                              <span class="formbold-radio-checkmark"></span>
                            </label>
                          </div>

                          <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                              <input
                                class="formbold-input-radio"
                                type="radio"
                                name="qusOne"
                                id="qusOne"
                              />
                              None of them
                              <span class="formbold-radio-checkmark"></span>
                            </label>
                          </div>
                    </div>
                </div>

                <!-- Soal 2 -->
                <div class="form-step soal">
                    <label for="qusTwo" class="formbold-form-label">To display an image on web, which tag is used?</label>
                    <div class="formbold-radio-flex">
                        <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                              <input
                                class="formbold-input-radio"
                                type="radio"
                                name="qusTwo"
                                id="qusTwo"
                              />
                              Option one
                              <span class="formbold-radio-checkmark"></span>
                            </label>
                          </div>

                          <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                              <input
                                class="formbold-input-radio"
                                type="radio"
                                name="qusTwo"
                                id="qusOne"
                              />
                              Option Two
                              <span class="formbold-radio-checkmark"></span>
                            </label>
                          </div>

                          <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                              <input
                                class="formbold-input-radio"
                                type="radio"
                                name="qusTwo"
                                id="qusTwo"
                              />
                              Option Three
                              <span class="formbold-radio-checkmark"></span>
                            </label>
                          </div>

                          <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                              <input
                                class="formbold-input-radio"
                                type="radio"
                                name="qusTwo"
                                id="qusTwo"
                              />
                              None of them
                              <span class="formbold-radio-checkmark"></span>
                            </label>
                          </div>
                    </div>
                </div>

                <!-- Soal 3 -->
                <div class="form-step soal">
                    <label for="qusThree" class="formbold-form-label">What is the full form of HTML?</label>
                    <div class="formbold-radio-flex">
                        <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                              <input
                                class="formbold-input-radio"
                                type="radio"
                                name="qusThree"
                                id="qusThree"
                              />
                              Option one
                              <span class="formbold-radio-checkmark"></span>
                            </label>
                          </div>

                          <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                              <input
                                class="formbold-input-radio"
                                type="radio"
                                name="qusThree"
                                id="qusThree"
                              />
                              Option Two
                              <span class="formbold-radio-checkmark"></span>
                            </label>
                          </div>

                          <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                              <input
                                class="formbold-input-radio"
                                type="radio"
                                name="qusThree"
                                id="qusThree"
                              />
                              Option Three
                              <span class="formbold-radio-checkmark"></span>
                            </label>
                          </div>

                          <div class="formbold-radio-group">
                            <label class="formbold-radio-label">
                              <input
                                class="formbold-input-radio"
                                type="radio"
                                name="qusThree"
                                id="qusThree"
                              />
                              None of them
                              <span class="formbold-radio-checkmark"></span>
                            </label>
                          </div>
                    </div>
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

    <script>
        const steps = document.querySelectorAll(".form-step");
        const soalSteps = document.querySelectorAll(".form-step.soal");
        let currentStep = 0;

        // Tambahkan nomor soal secara otomatis
        soalSteps.forEach((step, index) => {
            const label = step.querySelector(".formbold-form-label");
            label.textContent = `${index + 1}. ${label.textContent}`;
        });

        function showStep(step) {
            steps.forEach((element, index) => {
                element.classList.toggle("active", index === step);
            });

            // Tampilkan tombol "Next" atau "Submit" sesuai langkah
            document.getElementById("submitBtn").style.display = step === steps.length - 1 ? "block" : "none";
            document.getElementById("nextBtn").style.display = step === steps.length - 1 ? "none" : "block";

            // Sembunyikan tombol "Back" hanya pada langkah pertama
            document.getElementById("backBtn").style.display = step === 0 ? "none" : "block";
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

        showStep(currentStep);
    </script>
    </body>
    </html>
