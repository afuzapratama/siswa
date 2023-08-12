<?php

$curretPage = $_SERVER['PHP_SELF'];
$curretPage = explode('/', $curretPage);
$curretPage = end($curretPage);

$index = '';
$tugas = '';
$materi = '';
$komunitas = '';

if ($curretPage == 'index.php') {
    $index = 'active';
} elseif ($curretPage == 'tugas.php') {
    $tugas = 'active';
} elseif ($curretPage == 'materi.php') {
    $materi = 'active';
} elseif ($curretPage == 'komunitas.php') {
    $komunitas = 'active';
}


echo '
<nav class="navbar navbar-expand-lg bg-success">
    <div class="container">
        <button class="text-light navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i data-feather="menu" id="menu-icon"></i> menu
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link ' . $index . '" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ' . $tugas . '" href="tugas.php">Tugas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ' . $materi . '" href="materi.php">Materi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ' . $komunitas . '" href="komunitas.php">Komunitas</a>
            </li>
        </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-dropdown dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Nama Pengguna
                    </a>
                    <ul class="dropdown-menu bg-success dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                        <li><a class="dropdown-item" href="pengaturan.php">Pengaturan</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>';
