<?php
require_once('upload-img.php');

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "my_shop";
try {
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch (PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}



$USERS_ATRIBUTES = array(
    'id'        , 'nama_market'      , 'nama_pemilik',
    'nik'       , 'foto_ktp'         , 'username',
    'password'  , 'telepon'          , 'no_wa',
    'email'     , 'legalitas_market' , 'kecamatan',
    'kelurahan' , 'alamat_lengkap'   , 'level'
);
$STR_DB_USERS_ATRIBUTES = '';
foreach ($USERS_ATRIBUTES as $key => $value) $STR_DB_USERS_ATRIBUTES = $STR_DB_USERS_ATRIBUTES . $value . ', ';
$STR_DB_USERS_ATRIBUTES = substr($STR_DB_USERS_ATRIBUTES, 0, strlen($STR_DB_USERS_ATRIBUTES) - 2) . substr($STR_DB_USERS_ATRIBUTES, strlen($STR_DB_USERS_ATRIBUTES) - 1);


function valueToSqlStr(array $valueArr, mixed $file = null): array {
    $result = array();
    foreach ($valueArr as $key => $item) {
        if ($item == 'password') array_push($result, password_hash(filter_input(INPUT_POST, $item), PASSWORD_DEFAULT));
        else if ($item == 'foto_ktp' && $file) var_dump($_FILES[$item]);
        // array_push($result, uploadImg($_FILES, './user-photo-profile'));
        else array_push($result, htmlspecialchars(filter_input(INPUT_POST, $item)));
    }
    return $result;
}