<?php
include '../layout/header.php';
?>

<div class="container mt-5 mb-2">
        <div class="row">
            <div class="col-md-6 item-center">
                <img src="/assets/img/test.jpeg" alt="Foto Profil" class="foto-profil mx-auto d-block">
            </div>
            <div class="col-md-4 mb-4 text-start">
            <h2 class="profile-username">@<?= $_SESSION['username']; ?></h2>
    <div class="profile-details">
        <p><strong>Nama:</strong> NAMA_LENGKAP</p>
        <p><strong>Tanggal Lahir:</strong> TGL_LAHIR</p>
        <p><strong>Email:</strong> EMAIL</p>
        <p><strong>Sekolah:</strong> SEKOLAH</p>
        <p><strong>Kelas:</strong> KELAS</p>
        <p><strong>Alamat:</strong> ALAMAT</p>
    </div>
            </div>
            <div class="col-md-2 mb-3 text-center">
                <a href="/logout" class="btn btn-danger">Logout</a>
    
                <a href="/edit-profil" class="btn btn-primary">Edit Profil</a>
            </div>
        </div>
</div>


<?php
include '../layout/footer.php';
?>