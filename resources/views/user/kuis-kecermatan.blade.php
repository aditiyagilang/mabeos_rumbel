<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trial Test</title>
  <link rel="stylesheet" href="{{ 'assets/css/style4.css' }}">
  <style>
    /* Styling untuk menampilkan timer di tengah layar */
    #countdown-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      font-size: 3em;
      font-weight: bold;
      z-index: 999;
    }
  </style>
</head>

<body>
  <!-- Countdown container -->
  <div id="countdown-container">
    <span id="timer">3</span>
  </div>

  <div class="header">
    <h1>Trial Test <span id="kecermatan-id-display"></span></h1>
    <div>Durasi: <span id="timer-display">01:00</span></div>
  </div>

  <div class="content" style="display: none;">
    <!-- Section for Cards with Labels -->
    <div class="card-grid">
      <div id="cards-labels" class="card-labels"></div>
      <div id="cards" class="cards"></div>
    </div>

    <!-- Answers Section -->
    <div class="answer-grid" id="answers"></div>

    <!-- Choices Section -->
    <div class="choice-grid">
      <div class="choice" id="A" onclick="selectChoice('A')">A</div>
      <div class="choice" id="B" onclick="selectChoice('B')">B</div>
      <div class="choice" id="C" onclick="selectChoice('C')">C</div>
      <div class="choice" id="D" onclick="selectChoice('D')">D</div>
      <div class="choice" id="E" onclick="selectChoice('E')">E</div>
    </div>
  </div>

  <div class="footer">
    <h3>Skor: <span id="score">0</span></h3>
  </div>
  <script>
    const allSymbols = [
      "ϵ", "φ", "ψ", "Ι", "Ω", "θ", "δ", "Σ", "ξ", "Λ", "Π", "η", "μ", "κ", "τ",
      "ζ", "Χ", "β", "ν", "ω", "υ", "γ", "λ", "ρ", "π", "α", "ε", "σ", "ϑ"
    ]; // Kumpulan simbol
    let score = 0;
    let timer = 10; // 1 menit
    let currentSession = 1; // Sesi awal
    let currentCards = []; // Simbol untuk sesi saat ini

    // Fungsi untuk mengambil simbol acak
    function getRandomSymbols(count) {
      const shuffled = allSymbols.sort(() => Math.random() - 0.5);
      return shuffled.slice(0, count); // Ambil simbol acak
    }

    // Fungsi untuk memulai permainan
    function startGame() {
      if (currentSession === 1) {
        // Ambil 5 simbol untuk sesi pertama
        currentCards = getRandomSymbols(5);
      }

      const missingIndex = Math.floor(Math.random() * currentCards.length); // Indeks simbol yang hilang
      const missingSymbol = currentCards[missingIndex];

      // Menampilkan label A, B, C, D, E
      const cardsLabelsContainer = document.getElementById("cards-labels");
      cardsLabelsContainer.innerHTML = currentCards
        .map((_, index) => `<div class="label">${String.fromCharCode(65 + index)}</div>`)
        .join("");

      // Menampilkan simbol tetap (tidak diacak)
      const cardsContainer = document.getElementById("cards");
      cardsContainer.innerHTML = currentCards
        .map((symbol) => `<div class="card">${symbol}</div>`)
        .join("");

      // Menampilkan opsi jawaban yang diacak
      const answersContainer = document.getElementById("answers");
      const shuffledAnswers = currentCards
        .map((symbol, index) => (index !== missingIndex ? `<div class="answer" data-answer-id="${index}">${symbol}</div>` : ""))
        .sort(() => Math.random() - 0.5); // Mengacak urutan jawaban
      answersContainer.innerHTML = shuffledAnswers.join("");

      // Menyimpan jawaban yang benar
      document.body.dataset.correct = String.fromCharCode(65 + missingIndex); // Simpan jawaban (A-E)
      document.body.dataset.correctAnswerId = missingIndex; // Menyimpan ID jawaban yang benar

      currentSession++; // Increment session number
    }

    // Fungsi untuk memilih jawaban
    function selectChoice(choiceId) {
      const correctChoice = document.body.dataset.correct;
      const correctAnswerId = document.body.dataset.correctAnswerId; // Mendapatkan ID jawaban yang benar

      if (choiceId === correctChoice) {
        score++; // Tambah skor jika benar
      }

      document.getElementById("score").textContent = score;

      // Mengirimkan skor dan kecermatan_id ke server
      sendScoreToServer(correctAnswerId);

      // Lanjutkan ke sesi berikutnya setelah memilih jawaban
      startGame();
    }

    // Fungsi untuk memulai hitungan mundur
    function countdownAndStart() {
      const countdownElement = document.getElementById("timer");
      let countdown = 3;
      const countdownInterval = setInterval(() => {
        countdownElement.textContent = countdown;
        countdown--;
        if (countdown < 0) {
          clearInterval(countdownInterval);
          document.getElementById("countdown-container").style.display = "none"; // Sembunyikan hitungan mundur
          startTimer(); // Mulai timer setelah hitungan mundur selesai
          startGame();   // Mulai permainan
          document.querySelector('.content').style.display = 'block'; // Menampilkan konten permainan
        }
      }, 1000);
    }

    // Fungsi untuk memulai timer permainan
    function startTimer() {
      const timerElement = document.getElementById("timer-display");
      const interval = setInterval(() => {
        timer--;
        const minutes = String(Math.floor(timer / 60)).padStart(2, "0");
        const seconds = String(timer % 60).padStart(2, "0");
        timerElement.textContent = `${minutes}:${seconds}`;

        if (timer <= 0) {
          clearInterval(interval);
          sendScoreToServer(); // Kirim skor ke server ketika waktu habis
          incrementKecermatanId();

          // Menyegarkan halaman tanpa konfirmasi
          location.reload(); // Halaman akan di-refresh otomatis setelah waktu habis
        }
      }, 1000);
    }

    // Cek apakah ada `kecermatan_id` yang tersimpan di localStorage
    const storedKecermatanId = localStorage.getItem('kecermatan_id');
    const kecermatan_id = storedKecermatanId || '{{ $kecermatan_id }}'; // Gunakan localStorage atau fallback ke PHP value
    localStorage.setItem('kecermatan_id', kecermatan_id); // Simpan kecermatan_id di localStorage

    // Menampilkan kecermatan_id pada halaman
    document.getElementById('kecermatan-id-display').textContent = kecermatan_id;

    // Fungsi untuk mengirimkan skor ke server
    function sendScoreToServer(correctAnswerId = null) {
      console.log('Kecermatan ID:', kecermatan_id);
      console.log('Score:', score);

      fetch('/update-score', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}' // Jangan lupa token CSRF
        },
        body: JSON.stringify({
          score: score,
          kecermatan_id: kecermatan_id  // Mengirimkan ID kecermatan yang dipilih
        })
      })
      .then(response => response.json())
      .then(data => {
        console.log('Skor berhasil dikirim:', data);
        document.getElementById("score").style.display = 'none';
      })
      .catch(error => console.error('Error:', error));
    }

    function incrementKecermatanId() {
  // Mengambil kecermatan_id dari localStorage
  let kecermatanId = parseInt(localStorage.getItem('kecermatan_id')) || 1; // Default ke 1 jika tidak ada

  // Menambah kecermatan_id
  kecermatanId++;

  // Memastikan kecermatan_id tidak melebihi 9
  if (kecermatanId > 9) {
    // Arahkan pengguna ke halaman pemberitahuan setelah penambahan ke-9
    window.location.href = "/pemberitahuan"; // Ganti dengan URL yang sesuai
  } else {
    // Menyimpan kecermatan_id yang sudah ditambah ke localStorage
    localStorage.setItem('kecermatan_id', kecermatanId);
    console.log('Kecermatan ID:', kecermatanId);
  }
}


    // Memulai permainan ketika halaman selesai dimuat
    window.onload = countdownAndStart;
  </script>
</body>
</html>
