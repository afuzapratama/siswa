<?php

require_once 'connection.php';

try {
    // Ambil data dari POST
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ambil hash kata sandi dari database berdasarkan username
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && password_verify($password, $result['password'])) {
        session_start();

        $_SESSION['username'] = $username;
        $_SESSION['login'] = true;

        // Kata sandi cocok, cek nilai setup
        if ($result['setup'] == 0) {

            $response = array(
                "status" => "setup",
            );
        } elseif ($result['setup'] == 1) {
            $response = array(
                "status" => "dashboard"
            );
        }
    } else {
        $response = array(
            "status" => "error",
            "message" => "Invalid username or password."
        );
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
