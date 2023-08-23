<?php
require_once "../function/connection.php"; // Ganti ini dengan nama file koneksi

$query = "SELECT * FROM questions"; // Sesuaikan dengan nama tabel Anda
$stmt = $conn->query($query);

$questions = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $question = [
        "question" => $row["questions"],
        "options" => [$row["option1"], $row["option2"], $row["option3"], $row["option4"]],
        "correct" => $row["correct_option"],
        "points" => $row["points"]
    ];
    array_push($questions, $question);
}

header("Content-Type: application/json");
echo json_encode($questions);
