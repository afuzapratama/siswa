<?php
require_once '../vendor/autoload.php';


use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\AbstractDeviceParser;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


function get_device()
{
    AbstractDeviceParser::setVersionTruncation(AbstractDeviceParser::VERSION_TRUNCATION_NONE);
    $ua = $_SERVER['HTTP_USER_AGENT'];
    // $ua = 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)';
    $dd = new DeviceDetector($ua);
    $dd->parse();
    return $dd->getDeviceName();
}



$servername     = $_ENV['HOST_DB'];
$username       = $_ENV['USERNAME_DB'];
$password       = $_ENV['PASSWORD_DB'];
$dbname         = $_ENV['DATABASE_NAME'];

// Create connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // set the PDO error mode to exception
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
