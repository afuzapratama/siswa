<?php
include '../layout/header.php';
?>

<div class="container mt-2 mb-5">
    <a id="back" href="../dashboard/tugas.php" class="text-decoration-none h6 fw-bold">
        <i data-feather="arrow-left"></i> Kembali ke Tugas
    </a>
    <div class="col-12 mt-3">
        <div id="barprogress" class="progress mb-3" style="display: none;">
            <div id="progress-bar" class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div id="infoQuis" class="card online-test-soal">
            <div class="card-body">
                <h5 class="fw-bold">Soal Test Kuis</h5>
                <p>Topik : Tetang pemahaman pembalajaran komputer kelas X</p>
                <p><i data-feather="list"></i> 15 pertanyaan pilihan ganda</p>
                <p><i data-feather="clock"></i> 1,5 per pertanyaan</p>
                <hr>
                <h5 class="fw-bold">Sebelum memulai</h5>
                <ul>
                    <li>Pastikan koneksi internetmu aktif dan stabil</li>
                    <li>Jangan reload browser apapun yang terjadi</li>
                    <li>ini adalah satu sesi dan tidak bisa mengulang pilihan</li>
                </ul>
            </div>
            <div class="card-footer bg-white">
                <a href="../dashboard/materi.php" class="btn btn-outline-secondary">Latihan</a>
                <button id="startButton" class="btn btn-primary float-end">Mulai Test</button>
            </div>
        </div>
        <div class="card online-test-soal" id="soal" style="display: none;">
            <div class="card-body">
                <div id="getReady"></div>
                <div id="quizContainer" style="display: none;">
                    <h2>Question:</h2>
                    <p id="question"></p>
                    <ul id="options" class="list-group">
                        <!-- Options will be added dynamically using jQuery -->
                    </ul>
                    <p id="timer">Time left: <span id="time">30</span> seconds</p>
                </div>

                <div id="resultContainer" style="display: none;">
                    <h4 class="fw-bold"><i class="fas fa-check-circle text-success me-2"></i> Selesai Mengerjakan Soal
                    </h4>
                    <div class="text-center">
                        <img src="../assets/img/undraw_winners_ao2o.svg" alt="finish" class="img-fluid mb-2" width="200">
                        <p>Terima kasih telah menyelesaikan ujian atau tes.</p>
                        <p>Hasil penilaian akan muncul di halaman ini.</p>
                        <p class="h6">Kamu berhasil menjawab <span id="score"> dari <span id="totalQuestions"> soal</p>
                        <p class="h1">Persentase Jawaban <span id="percentage"></p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <i data-feather="check-circle"></i>
                        <h5 class="mt-2">Hasil Penilaian</h5>
                        <h2 class="text-primary"><span id="totalPoints"> Point</h2>
                        <h6 class="text-muted">Sangat Baik</h6>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="../dashboard/tugas.php" class="btn btn-outline-secondary">Kembali ke Tugas</a>
                        <a href="../dashboard/materi.php" class="btn btn-primary">Lihat Materi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var currentQuestion = 0;
        var questions;

        $.getJSON("questions.json", function(data) {
            questions = data;

            $("#startButton").click(function() {
                $("#soal").show();
                startCountdown(3);
                $("#startButton").hide();
                $("#infoQuis").hide();
                $("#quizContainer").hide();
                $("#back").hide();
            });

            function showQuestion(questionIndex) {
                var question = questions[questionIndex];
                $("#question").text(question.question);
                $("#options").empty();
                for (var i = 0; i < question.options.length; i++) {
                    $("#options").append(`
            <li class="list-group-item" data-option="${i}">${question.options[i]}</li>
        `);
                }
                $(".list-group-item").click(function() {
                    $(".list-group-item").removeClass("selected");
                    $(this).addClass("selected");
                    var chosenOption = $(this).data("option");
                    checkAnswer(chosenOption, questionIndex);
                });
            }

            function checkAnswer(chosenOption, questionIndex) {
                clearInterval(timerInterval);
                var correctOption = questions[questionIndex].correct;
                if (chosenOption === correctOption) {
                    questions[questionIndex].userAnswer = chosenOption;
                }
                currentQuestion++;
                if (currentQuestion < questions.length) {
                    showQuestion(currentQuestion);
                    startTimer();
                } else {
                    showResults();
                }
            }

            var timerInterval;
            var progressBar;

            function startTimer() {
                var timeLeft = 30;
                $("#time").text(timeLeft);
                $("#progress-bar").css("width", "100%");

                timerInterval = setInterval(function() {
                    timeLeft--;
                    $("#time").text(timeLeft);
                    $("#progress-bar").css("width", (timeLeft / 30) * 100 + "%");
                    if (timeLeft === 0) {
                        clearInterval(timerInterval);
                        alert("Time's up!");
                        currentQuestion++;
                        if (currentQuestion < questions.length) {
                            showQuestion(currentQuestion);
                            startTimer();
                        } else {
                            showResults();
                        }
                    }
                }, 1000);
            }

            function startCountdown(seconds) {
                $("#getReady").html("<h2>Get ready...<span id='countdown'>" + seconds + "</span></h2>");
                var countdownInterval = setInterval(function() {
                    seconds--;
                    $("#countdown").text(seconds);
                    if (seconds === 0) {
                        clearInterval(countdownInterval);
                        $("#getReady").hide();
                        $("#barprogress").show();
                        $("#quizContainer").show();
                        showQuestion(currentQuestion);
                        startTimer();
                    }
                }, 1000);
            }

            function showResults() {
                $("#quizContainer").hide();
                $("#resultContainer").show();
                var correctAnswers = 0;
                var totalPoints = 0;

                for (var i = 0; i < questions.length; i++) {
                    if (questions[i].userAnswer === questions[i].correct) {
                        correctAnswers++;
                        totalPoints += questions[i].points;
                    }
                }

                var percentage = (correctAnswers / questions.length) * 100;
                $("#barprogress").hide();
                $("#score").text(correctAnswers);
                $("#totalPoints").text(totalPoints);
                $("#totalQuestions").text(questions.length);
                $("#percentage").text(percentage.toFixed(2) + "%");
            }
        });
    });
</script>
<?php
include '../layout/footer.php';
?>