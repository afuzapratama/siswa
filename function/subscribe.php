<?php
// Store the received token in your database
$deviceToken = $_POST['token'];

$saveFile = fopen("token.txt", "w") or die("Unable to open file!");
fwrite($saveFile, $deviceToken);
fclose($saveFile);


echo "Token saved successfully";
