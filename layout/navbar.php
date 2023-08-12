<?php

$index = '';
$tugas = '';
$materi = '';
$komunitas = '';
$sofware = '';

if ($curretPage == 'index.php') {
    $index = 'active';
} elseif ($curretPage == 'tugas.php') {
    $tugas = 'active';
} elseif ($curretPage == 'materi.php') {
    $materi = 'active';
} elseif ($curretPage == 'komunitas.php') {
    $komunitas = 'active';
} elseif ($curretPage == 'software.php') {
    $sofware = 'active';
}

$pattern = '/online-test/';
$linkfull = $_SERVER['PHP_SELF'];
?>
<nav class="navbar navbar-expand-lg bg-success">
    <div class="container">
        <?php
        if (preg_match($pattern, $linkfull)) {
        ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <div class="nav-link online-test-font">SOAL : 14</div>
                </li>
                <li class="nav-item">
                    <div class="nav-link online-test-font">Waktu : 8 Menit</div>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <div class="nav-link online-test-font">Berjalan : 7 Menit 23 detik</div>
                </li>
            </ul>
        <?php
        } else {
        ?>
            <button class="text-light navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i data-feather="menu" id="menu-icon"></i><span id="btn-menu"> menu</span>
            </button>
            <a type="button" class="btn btn-primary text-end mobile-notif">
                <i data-feather="bell"></i> 9
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $index ?>" href="../dashboard/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $tugas ?>" href="../dashboard/tugas.php">Tugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $materi ?>" href="../dashboard/materi.php">Materi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $sofware ?>" href="../dashboard/software.php">Software</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $komunitas ?>" href="../thread/komunitas.php">Komunitas</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <a type="button" class="btn btn-primary pc-notif">
                        <i data-feather="bell"></i> 9
                    </a>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-dropdown dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Nama Pengguna
                        </a>
                        <ul class="dropdown-menu bg-success dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="../dashboard/profil.php">Profil</a></li>
                            <li><a class="dropdown-item" href="../dashboard/pengaturan.php">Pengaturan</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Keluar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        <?php
        }
        ?>
    </div>
</nav>