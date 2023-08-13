<?php
include '../layout/header.php';
?>
<div class="container mt-3 mb-5">
    <div class="col-12 mt-4">
        <div class="card online-test-soal">
            <div class="card-body">
                <h4 class="fw-bold"><i class="fas fa-check-circle text-success me-2"></i> Selesai Mengerjakan Soal</h4>
                <div class="text-center">
                    <img src="../assets/img/undraw_winners_ao2o.svg" alt="finish" class="img-fluid mb-2" width="200">
                    <p>Terima kasih telah menyelesaikan ujian atau tes.</p>
                    <p>Hasil penilaian akan muncul di halaman ini.</p>
                    <p class="h6">Kamu berhasil menjawab 13 soal</p>
                </div>
                <hr>
                <div class="text-center">
                    <i data-feather="check-circle"></i>
                    <h5 class="mt-2">Hasil Penilaian</h5>
                    <h2 class="text-primary">80 Point</h2>
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
    <?php
    include '../layout/footer.php';
    ?>