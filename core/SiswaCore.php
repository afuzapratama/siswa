<?php

require_once 'helper.php';

function LoginSiswa($username, $password)
{
    $data = [
        'username' => $username,
        'password' => $password,
        'userAgent' => get_device()
    ];

    $pathlogin = $_ENV['SISWA_PATH'] . 'login';

    $ACCESS_TOKEN = CurlData($pathlogin, 'POST', $data);

    $loginData = json_decode($ACCESS_TOKEN, true);

    $status = $loginData['status'];
    $kode_kelas = $loginData['data']['kode_kelas'];

    if ($status == 'success') {

        $Number_KODE = $loginData['NumberKode'];

        $pathlogin = $_ENV['SISWA_PATH'] . 'session/' . $Number_KODE;

        $result = CurlData($pathlogin, 'GET', null);

        $refreshToken = json_decode($result, true);

        $refreshToken = $refreshToken['data']['siswaSession']['refreshToken'];

        // Definisikan array cookie
        $cookies = [
            [
                'name' => 'v2siswa_refresh',
                'value' => $refreshToken,
                'expiration' => time() + (7 * 24 * 60 * 60), // 1 minggu
                'path' => '/',
                'domain' => '', // Ganti dengan domain Anda
                'secure' => false, // Hanya dapat diakses melalui HTTPS
                'http_only' => true, // Tidak dapat diakses melalui JavaScript
            ],
            [
                'name' => 'v2siswa_username',
                'value' => $username,
                'expiration' => time() + (7 * 24 * 60 * 60), // 1 minggu
                'path' => '/',
                'domain' => '', // Ganti dengan domain Anda
                'secure' => false, // Hanya dapat diakses melalui HTTPS
                'http_only' => true, // Tidak dapat diakses melalui JavaScript
            ],
            [
                'name' => 'v2siswa_kode_kelas',
                'value' => $kode_kelas,
                'expiration' => time() + (7 * 24 * 60 * 60), // 1 minggu
                'path' => '/',
                'domain' => '', // Ganti dengan domain Anda
                'secure' => false, // Hanya dapat diakses melalui HTTPS
                'http_only' => true, // Tidak dapat diakses melalui JavaScript
            ],
            // Tambahkan cookie lainnya jika diperlukan
        ];

        // Set semua cookie dalam array
        foreach ($cookies as $cookie) {
            setcookie(
                $cookie['name'],
                $cookie['value'],
                $cookie['expiration'],
                $cookie['path'],
                $cookie['domain'],
                $cookie['secure'],
                $cookie['http_only']
            );
        }

        $response = json_encode(['status' => 'success', 'message' => 'Login berhasil']);
        return $response;

    } else {
        return $ACCESS_TOKEN;
    }
}

echo LoginSiswa('natama', '123456');

function getAllSiswa()
{
    $pathlogin = $_ENV['SISWA_PATH'] . 'siswa';

    $result = CurlData($pathlogin, 'GET', null);
    return $result;
}

function getDetailSiswa($username)
{
    $pathlogin = $_ENV['SISWA_PATH'] . 'siswa/' . $username;

    $result = CurlData($pathlogin, 'GET', null);
    return $result;
}

function registerSiswa($username, $email, $password, $kode_kelas)
{
    // Validasi input
    if (empty($username) || empty($email) || empty($password) || empty($kode_kelas) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = json_encode(['status' => 'error', 'message' => 'Input tidak valid']);
        return $response;
    }

    $pathcekKode = $_ENV['KELAS_PATH'] . $kode_kelas;

    $cekKodes = CurlData($pathcekKode, 'GET', null);

    $cekKode = json_decode($cekKodes, true);

    $StatusKode = $cekKode['status'];

    if ($StatusKode == 'failed') {
        return $cekKodes;
    } else {
        $pathlogin = $_ENV['SISWA_PATH'] . 'register';
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'kode_kelas' => $kode_kelas
        ];
        $result = CurlData($pathlogin, 'POST', $data);
        return $result;
    }
}

function refreshToken(){

    $pathlogin = $_ENV['URL_API'] .$_ENV['SISWA_PATH'] . 'refresh';

    $refresh = @$_COOKIE['v2siswa_refresh'];

    $data = [
        'refreshToken' => $refresh
    ];

    $result = file_get_contents($pathlogin, false, stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/json\r\n",
            'content' => json_encode($data)
        ]
    ]));
    $result = json_decode($result, true);

    $accessToken = @$result['data']['accessToken'];
    return $accessToken;
}

function LogoutSiswa(){


    $pathlogin = $_ENV['SISWA_PATH'] . 'logout';

    $data = [
        'refreshToken' => $_COOKIE['v2siswa_refresh']
    ];

    $result = CurlData($pathlogin, 'DELETE',  $data);

    $result = json_decode($result, true);

    $status = $result['status'];

    if ($status == 'success') {
        // Definisikan array cookie
        $cookies = [
            [
                'name' => 'v2siswa_refresh',
                'value' => '',
                'expiration' => time() - (7 * 24 * 60 * 60), // 1 minggu
                'path' => '/',
                'domain' => '', // Ganti dengan domain Anda
                'secure' => false, // Hanya dapat diakses melalui HTTPS
                'http_only' => true, // Tidak dapat diakses melalui JavaScript
            ],
            [
                'name' => 'v2siswa_username',
                'value' => '',
                'expiration' => time() - (7 * 24 * 60 * 60), // 1 minggu
                'path' => '/',
                'domain' => '', // Ganti dengan domain Anda
                'secure' => false, // Hanya dapat diakses melalui HTTPS
                'http_only' => true, // Tidak dapat diakses melalui JavaScript
            ],
            [
                'name' => 'v2siswa_kode_kelas',
                'value' => '',
                'expiration' => time() + (7 * 24 * 60 * 60), // 1 minggu
                'path' => '/',
                'domain' => '', // Ganti dengan domain Anda
                'secure' => false, // Hanya dapat diakses melalui HTTPS
                'http_only' => true, // Tidak dapat diakses melalui JavaScript
            ],
            // Tambahkan cookie lainnya jika diperlukan
        ];

        // Set semua cookie dalam array
        foreach ($cookies as $cookie) {
            setcookie(
                $cookie['name'],
                $cookie['value'],
                $cookie['expiration'],
                $cookie['path'],
                $cookie['domain'],
                $cookie['secure'],
                $cookie['http_only']
            );
        }

        $response = json_encode(['status' => 'success', 'message' => 'Logout berhasil']);
        return $response;
    } else {
        return $result;
    }
}

// echo LogoutSiswa();