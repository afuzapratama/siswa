<?php


require_once 'connection.php';

header('Content-Type: application/json');

try {
    // Ambil data dari POST
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rememberMe = $_POST['remember'];

    // Ambil hash kata sandi dan setup dari database berdasarkan username
    $stmt = $conn->prepare("SELECT password, setup FROM siswa WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && password_verify($password, $result['password'])) {

        $sessionToken = bin2hex(random_bytes(32));

        session_start();
        $_SESSION['username'] = $username;



        //store session token in database
        $query ="INSERT INTO user_sessions (user_id, session_token, 	device_name , created_at, last_activity)
        VALUES (:user_id, :session_token, :device_name ,NOW(), NOW())";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':sessionToken', $sessionToken);
        $stmt->bindParam(':username', $username);
        $stmt->execute();


        if ($rememberMe == true) {
            setcookie('username', $username, time() + (86400 * 30), "/");
        }else {
            setcookie('username', "", time() - 3600, "/");
        }

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
    echo "Error: " . $e->getMessage();
}

echo json_encode($response);