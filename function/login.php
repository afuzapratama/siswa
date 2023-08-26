<?php

require_once 'connection.php';

header('Content-Type: application/json');

try {
    // Ambil data dari POST
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rememberMe = $_POST['savelogin'];

    // Ambil hash kata sandi dan setup dari database berdasarkan username
    $stmt = $conn->prepare("SELECT password, setup, id_siswa FROM siswa WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && password_verify($password, $result['password'])) {
        $sessionToken = bin2hex(random_bytes(32));

        session_start();
        $_SESSION['username'] = $username;
        
        
        //store session token in database
        $query = "INSERT INTO siswa_sessions (siswa_id, session_token, user_agent, created_at, last_activity)
                  VALUES (:siswa_id, :session_token, :user_agent, NOW(), NOW())";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':siswa_id', $result['id_siswa']); // Use the fetched user id
        $stmt->bindParam(':session_token', $sessionToken);
        $stmt->bindParam(':user_agent', $_SERVER['HTTP_USER_AGENT']); // Example of using user agent as device name
        $stmt->execute();

        $cookieExpiration = $rememberMe == 1 ? time() + (86400 * 30) : time() + (86400 * 1);
        setcookie('set-keys', $sessionToken, $cookieExpiration, "/");

        // Kata sandi cocok, cek nilai setup
        if ($result['setup'] == 0) {
            $response = array(
                "status" => "setup",
            );
        } else if ($result['setup'] == 1) {
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
    $response = array(
        "status" => "error",
        "message" => $e->getMessage()
    );
}

echo json_encode($response);
