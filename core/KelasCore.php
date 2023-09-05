<?php

require_once "helper.php";

function CreatKelas($sekolah,$kelas,$mapel,$status){

    $data = [
        'sekolah' => $sekolah,
        'kelas' => $kelas,
        'matapelajaran' => $mapel,
        'status' => $status
    ];

    $pathlogin = $_ENV['KELAS_PATH'].'generat';
    
    $result = CurlData($pathlogin,'POST',$data);

    return $result;
}

var_dump(CreatKelas('SMA 1','XII IPA 1','Matematika','Aktif'));