<?php

require_once 'connection.php';

session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Hapus session token dari database
    $query = "DELETE FROM siswa_sessions WHERE siswa_id = (SELECT id_siswa FROM siswa WHERE username = :username)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Hapus cookie dengan mengatur waktu kedaluwarsa ke masa lalu
    setcookie('set-keys', '', time() - 3600, '/');

    // Hapus semua data sesi dari server
    session_unset();
    session_destroy();

    $response = array(
        "status" => "success",
        "message" => "Logout successful."
    );
} else {
    $response = array(
        "status" => "error",
        "message" => "No active session found."
    );
}

echo json_encode($response);