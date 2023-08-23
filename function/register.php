<?php
header('Content-Type: application/json');

require_once 'connection.php';

try {
    // Ambil data dari POST
    $username = $_POST['username'];
    $email = $_POST['email'];
    $raw_password = $_POST['password']; // Kata sandi sebelum dienkripsi
    $password = password_hash($raw_password, PASSWORD_DEFAULT); // Enkripsi kata sandi
    $kode = $_POST['kode'];

    // Cek apakah username atau email sudah ada dalam database
    $checkQuery = "SELECT COUNT(*) AS count FROM siswa WHERE username = :username OR email = :email";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bindParam(':username', $username);
    $checkStmt->bindParam(':email', $email);
    $checkStmt->execute();
    $result = $checkStmt->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] > 0) {
        $response = array(
            "status" => "success",
            "message" => "Data dengan username atau email yang sama sudah ada.",
            "alert" => "alert-danger"
        );
    } else {
        // Jika belum ada, lakukan penyimpanan
        $insertQuery = "INSERT INTO siswa (username, email, password, kode_kelas, setup) VALUES (:username, :email, :password, :kode_kelas, :setup)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bindParam(':username', $username);
        $insertStmt->bindParam(':email', $email);
        $insertStmt->bindParam(':password', $password);
        $insertStmt->bindParam(':kode_kelas', $kode);
        $insertStmt->bindValue(':setup', 0, PDO::PARAM_INT);

        if ($insertStmt->execute()) {

            // Data berhasil disimpan, kirim email
            $to = $email;
            $subject = "Pendaftaran Student Learning";
            $message = "Selamat data bak,\n\n"
                . "Data registrasi kamu:\n"
                . "Username: $username\n"
                . "Password: $raw_password\n\n"
                . "Selamat belajar nak!";

            $headers = "From: Bapak Afuza Pratama,S.Kom\r\n"
                . "Reply-To: saya@i.nemail.site\r\n"
                . "Content-Type: text/plain; charset=UTF-8\r\n";

            if (mail($to, $subject, $message, $headers)) {
                $response = array(
                    "status" => "success",
                    "message" => "Kamu berhasil mendaftar, silahkan login. Data username dan password telah dikirim ke email.",
                    "alert" => "alert-success"
                );
            } else {
                $response = array(
                    "status" => "error",
                    "message" => "Gagal mengirim email. Silahkan hubungi administrator."
                );
            }
        } else {
            $response = array(
                "status" => "error",
                "message" => "Gagal mendaftar, pastikan kode benar. Silahkan bertanya pada guru.",
                "alert" => "alert-danger"
            );
        }
    }
} catch (PDOException $e) {
    $response = array(
        "status" => "error",
        "message" => $e->getMessage(),
        "alert" => "alert-danger"
    );
}

echo json_encode($response);
