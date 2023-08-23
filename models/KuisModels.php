<?php
require_once "../function/connection.php";

function get_soal($id)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM soal WHERE id_soal = '$id'");
    return $query->fetch(PDO::FETCH_ASSOC);
}
