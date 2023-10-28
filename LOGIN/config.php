<?php
require_once('upload-img.php');

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "my_shop";
$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);



$SQL_USERS_ATRIBUTES = array(
    'nama_market'      , 'nama_pemilik' , 'nik',
    'foto_ktp'         , 'username'     , 'password',
    'telepon'          , 'no_wa'        , 'email',
    'legalitas_market' , 'kecamatan'    , 'kelurahan',
    'alamat_lengkap'   , 'level'
);

$FORM_USERS_ATRIBUTES = array(
    'nama_market'      , 'nama_pemilik' , 'nik', 
    'foto_ktp'         , 'username'     , 'password',
    'telepon'          , 'no_wa'        , 'email',
    'legalitas_market' , 'kecamatan'    , 'kelurahan',
    'alamat_lengkap'
);

$STR_USERS_ATRIBUTES = '';
foreach ($SQL_USERS_ATRIBUTES as $key => $value) {
    if ($key == sizeof($SQL_USERS_ATRIBUTES) - 1) $STR_USERS_ATRIBUTES .= '`' . $value . '`';
    else $STR_USERS_ATRIBUTES .= '`' . $value . '`' . ', ';
}



function valueToSqlStr(array $listValue, string $imgName = null, string $pathImg = null) : array {
    global $db;
    $result = '';
    foreach ($listValue as $index => $item) {
        if ($item == 'password') $result .= "'" . password_hash(filter_input(INPUT_POST, $item), PASSWORD_DEFAULT) . "'" . ', ';
        else if ($item == $imgName && $imgName && $pathImg) {
            $img = uploadImg($_FILES[$imgName], $pathImg, 5000000);
            if ($img['result']) $result .= "'" . $img['result'] . "'" . ', ';
            else return ['error' => $img['error'], 'result' => false];
        }
        else $result .= "'" . mysqli_real_escape_string($db, htmlspecialchars(filter_input(INPUT_POST, $item))) . "'" . ', ';
    }
    $result = substr($result, 0, strlen($result) - 2) . substr($result, strlen($result) - 1);
    return ['error' => '', 'result' => $result];
}