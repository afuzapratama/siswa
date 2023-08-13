<?php
include '../layout/header.php';
?>

<div class="container mt-3 mb-5">
    <a href="../dashboard/tugas.php" class="text-decoration-none h6 fw-bold">
        <i data-feather="arrow-left"></i> Kembali ke Tugas
    </a>
    <div class="col-12 mt-4">
        <div class="card online-test-soal">
            <div class="card-body">
                <h5 class="fw-bold">Soal Test Kuis</h5>
                <p>Topik : Tetang pemahaman pembalajaran komputer kelas X</p>
                <p class="text-muted">Semua Nilai Akan muncul di akhir</p>
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
                <a href="../soal/index.php" class="btn btn-primary float-end">Mulai Test</a>
            </div>
        </div>
    </div>
</div>

<?php
include '../layout/footer.php';
?>