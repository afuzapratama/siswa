<?php
require_once 'connection.php';
require_once 'helper.php';

header('Content-Type: application/json');

session_start();

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sekolah = $_POST['sekolah'];
        $kelas = $_POST['kelas'];
        $mapel = $_POST['mapel'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $tgl_lahir = date('Y-m-d', strtotime($tgl_lahir));
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $username = $_SESSION['username'];

        // Check if file is uploaded
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['file'];
            
            $image_url = uploadFile($image, 'siswa', $username);

            if ($image_url !== null) {
                // Insert data into the database
                $query = "INSERT INTO detail_siswa (username, nama_lengkap, tgl_lahir, img_siswa, sekolah, kelas, alamat)
                VALUES (:username, :nama_lengkap, :tgl_lahir, :img_siswa, :sekolah, :kelas, :alamat)";
      
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':username', $username); // Assuming you have a $username variable
                $stmt->bindParam(':nama_lengkap', $nama);
                $stmt->bindParam(':tgl_lahir', $tgl_lahir); // Assuming you have a $tgl_lahir variable
                $stmt->bindParam(':img_siswa', $image_url);
                $stmt->bindParam(':sekolah', $sekolah);
                $stmt->bindParam(':kelas', $kelas);
                $stmt->bindParam(':alamat', $alamat);
                
                $stmt->execute();

                // Update setup flag
                $updateSetup = "UPDATE siswa SET setup = 1 WHERE username = :username";
                $stmtSetup = $conn->prepare($updateSetup);
                $stmtSetup->bindParam(':username', $username);
                $stmtSetup->execute();

                // Respond with success message
                $response = ['status' => 'success', 'message' => 'File uploaded and data inserted.'];
            } else {
                $response = ['status' => 'error', 'message' => 'Error uploading file.'];
            }
        } else {
            $response = ['status' => 'error', 'message' => 'File upload error.'];
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Invalid request method.'];
    }
} catch (\Exception $e) {
    $response = ['status' => 'error', 'message' => 'An error occurred.', 'error_details' => $e->getMessage()];
}

echo json_encode($response);
?>
