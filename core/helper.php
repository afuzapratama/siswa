<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

require_once '../vendor/autoload.php';


use DeviceDetector\ClientHints;
use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\AbstractDeviceParser;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


function get_device()
{
    AbstractDeviceParser::setVersionTruncation(AbstractDeviceParser::VERSION_TRUNCATION_NONE);
    $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse
    $clientHints = ClientHints::factory($_SERVER); // client hints are optional
    
    $dd = new DeviceDetector($userAgent, $clientHints);
    $dd->parse();
    return $dd->getDeviceName();

}

function CurlData($path, $method, $data)
{
    $Access_Token = refreshToken();
    
    $url = $_ENV['URL_API'] . $path;

    // Inisialisasi cURL
    $curl = curl_init($url);

    // Setel opsi cURL
    curl_setopt_array($curl, [
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_RETURNTRANSFER => true,
    ]);

    // Setel header untuk mengirim data JSON dan Authorization header
    if ($method === 'POST' || $method === 'PUT' || $method === 'DELETE') {
        $json_data = json_encode($data);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json_data),
            'Authorization: Bearer ' . $Access_Token, // Tambahkan header Authorization di sini
        ]);
    } else {
        // Jika tidak ada data yang dikirim, tetap tambahkan header Authorization
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $Access_Token, // Tambahkan header Authorization di sini
        ]);
    }

    // Eksekusi permintaan cURL
    $result = curl_exec($curl);

    // Tutup koneksi cURL
    curl_close($curl);

    // Mengembalikan respons langsung dari hasil curl
    return $result;
}