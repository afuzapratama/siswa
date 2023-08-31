<?php
require_once 'connection.php';
require '../vendor/autoload.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

header('Content-Type: application/json');

session_start();

$username = $_SESSION['username'];

$query = "SELECT * FROM detail_siswa WHERE username = :username";
$statement = $conn->prepare($query);
$statement->bindParam(':username', $username);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

$dataArray = [
    'username' => $username,
    'nama' => $result[0]['nama_lengkap'],
    'kelas' => $result[0]['kelas'],
    'status' => 'hadir'
];

$dbData = json_encode($dataArray);

// Create QROptions instance and set properties
$options = new QROptions([
    'version' => 7,
    'imageBase64' => true,
]);

// Create a QRCode instance with the specified options
$qrCode = new QRCode($options);

// Generate QR code
$qrimg = [
    'qrUrl' => $qrCode->render($dbData)
];

$qrData = json_encode($qrimg);

echo $qrData;