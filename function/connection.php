<?php
$servername     = "localhost";
$username       = "root";
$password       = "Lonteq@123";
$dbname         = "siswa";

// Create connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // set the PDO error mode to exception
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
