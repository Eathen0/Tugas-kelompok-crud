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



function valueToSqlStr(
    array $listValue, string $resultType, 
    string $password = null, string $rePassword = null, 
    string $imgName = null, string $pathImg = null
    ) : array {


    global $db;
    $result = array();
    $imgFileName = null;


    foreach ($listValue as $index => $item) {
        if ($item == $password) {

            if ($rePassword) {

                if (filter_input(INPUT_POST, $password) == filter_input(INPUT_POST, $rePassword)) {
                    array_push($result, password_hash(filter_input(INPUT_POST, $password), PASSWORD_DEFAULT));
                } else {
                    if ($imgFileName && file_exists($imgFileName)) unlink($imgFileName);
                    return ['error' => 'password dan rePassword tidak sama', 'result' => false];
                }

            } else {
                array_push($result, password_hash(filter_input(INPUT_POST, $password), PASSWORD_DEFAULT));
            }

        } else if ($item == $imgName && $imgName && $pathImg) {

            $img = uploadImg($_FILES[$imgName], $pathImg, 5000000);

            if ($img['result']) {
                array_push($result, $img['result']);
                $imgFileName = $img['result'];
            }

            else return ['error' => $img['error'], 'result' => false];

        }
        else array_push($result, mysqli_real_escape_string($db, htmlspecialchars(filter_input(INPUT_POST, $item))));
    }


    if ($resultType == 'string') {
        $strResult = '';
        foreach ($result as $key => $value) {
            $strResult .= "'" . $value . "'" . ', ';
        }
        $strResult = substr($strResult, 0, strlen($strResult) - 2) . substr($strResult, strlen($strResult) - 1);
        return ['error' => '', 'result' => $strResult, 'imgFileName' => $imgFileName];
    } else return ['error' => '', 'result' => $result, 'imgFileName' => $imgFileName];
}



function errorPopupTamplate(string $massage) : string {
    return "
        <div class='popup-window' id='error-window'>
            <div class='error-popup'>
                <h1>Error!</h1>
                <p>$massage</p>
                <button>close</button>
            </div>
        </div>
    ";
}