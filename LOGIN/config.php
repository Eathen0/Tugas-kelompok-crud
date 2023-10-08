<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "blonjo";

$DATA = [
    'id', 'nama_market', 'nama_pemilik',
    'nik', 'foto_ktp', 'username',
    'password', 'telepon', 'no_wa',
    'email', 'legalitas_market', 'kecamatan',
    'kelurahan', 'alamat_lengkap', 'level' 
];

try {
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch (PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}