<?php
require_once("config.php");
$sql = sprintf("
INSERT INTO users (
    %s
) 
VALUES (
    :%s
)", $STR_DB_USERS_ATRIBUTES, $STR_DB_USERS_ATRIBUTES);



// echo $sql;
// echo var_dump(valueToSqlStr(["lkjljlk", "klkllk;", "ldkj"]));
// foreach ($db->query('SELECT * FROM users') as $item) {
//     echo $item;
// }
// if (isset($_POST['register'])) {

//     // filter data yang diinputkan
//     $name = filter_input(INPUT_POST, 'name', HTML_SPECIALCHARS);
//     $username = filter_input(INPUT_POST, 'username', HTML_SPECIALCHARS);
//     // enkripsi password
//     $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
//     $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


//     // menyiapkan query
//     $sql = sprintf("INSERT INTO users (
//                 %s ,%s ,%s ,%s ,%s ,%s ,%s ,%s ,%s ,%s ,%s ,%s
//             ) 
//             VALUES (
//                 :%s, :%s, :%s, :%s, :%s, :%s, :%s, :%s, :%s, :%s, :%s, :%s,
//             )", $DATA[0], $DATA[1], $DATA[2], $DATA[3], $DATA[4], $DATA[5], $DATA[6], $DATA[7], $DATA[8], $DATA[9], $DATA[10], $DATA[11]);
//     $stmt = $db->prepare($sql);

//     // bind parameter ke query
//     $params = array(
//         ":name" => $name,
//         ":username" => $username,
//         ":password" => $password,
//         ":email" => $email
//     );

//     // eksekusi query untuk menyimpan ke database
//     $saved = $stmt->execute($params);

//     // jika query simpan berhasil, maka user sudah terdaftar
//     // maka alihkan ke halaman login
//     if ($saved) {
//         header("Location: login.php");
//     }
// }

if (isset($_POST['register'])) {
    foreach(valueToSqlStr(array_splice(array_replace([], $USERS_ATRIBUTES), 1, sizeof($USERS_ATRIBUTES) - 2), $_FILES['foto_ktp']) as $key => $item) {
        echo var_dump($item) . $USERS_ATRIBUTES[$key + 1] . '<br/>';
        // echo $item . '<br/>';
    };
    // header('location: register.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/register-page.css">
    <title>Food Amanah - Daftar</title>
</head>

<body>
    <nav>
        <div class="icon">
            <a href="index.php">
                <img src="./img/icon.png" alt="" class="logo" draggable="false">
            </a>
            <p>Food Amanah</p>
        </div>
        <div>
            <a href="login.php" class="btn btn-primary">Masuk</a>
        </div>
    </nav>

    <main class="container">
        <img class="logo" src="./img/icon.png" alt="">
        <h2 class="judul-form">PENDAFTARAN</h2>

        <form action="register.php" method="POST" enctype="multipart/form-data">
            <div class="input-container">
                <label for="nama_market">Nama Market <span>*</span></label>
                <input type="text" name="nama_market" placeholder="Masukan Nama Market" required />
            </div>
            <div class="input-container">
                <label for="nama_pemilik">Nama Pemilik <span>*</span></label>
                <input type="text" name="nama_pemilik" placeholder="Masukan nama lengkap" required />
            </div>
            <div class="input-container">
                <label for="nik">NIK/No. KTP <span>*</span></label>
                <input type="text" name="nik" placeholder="Masukan NIK / No.KTP" required />
            </div>
            <div class="input-container">
                <label for="foto_ktp">Foto KTP <span>*</span></label>
                <div class="inp-ktp" id="input-foto-container">
                    <img class="img-preview" src="./img/code.png" alt="">
                    <input type="file" accept="image/*" name="foto_ktp" id="input-foto" required />
                    <p id="file-name">Upload Foto</p>
                </div>
            </div>
            <div class="input-container">
                <label for="username">Username <span>*</span></label>
                <input type="text" name="username" placeholder="Digunakan untuk login" required />
            </div>
            <div class="input-container">
                <label for="password">Password <span>*</span></label>
                <input type="password" name="password" placeholder="Masukan password" required />
            </div>
            <div class="input-container">
                <label for="rePassword">Repassword <span>*</span></label>
                <input type="password" name="rePassword" placeholder="Masukan kembali password" required />
            </div>
            <div class="input-container">
                <label for="telepon">No.Telepon/HP <span>*</span></label>
                <input type="number" name="telepon" placeholder="Masukan No. Telepon" required />
            </div>
            <div class="input-container">
                <label for="no_wa">No. WhatsApp <span>*</span></label>
                <input type="text" name="no_wa" placeholder="Masukan kembali WhasApp" required />
            </div>
            <div class="input-container">
                <label for="email">Email <span>*</span></label>
                <input type="email" name="email" placeholder="Masukan Email Aktif" required />
            </div>
            <div class="input-container">
                <label for="legalitas_market">Legalitas Market <span>*</span></label>
                <div>
                    <textarea name="legalitas_market" id="legalitas" required></textarea>
                    <span>* Di Isi legalitas Market Seperti SIUP, SKDP, TDP, dan lain-lain Bila Ada</span>
                </div>
            </div>
            <div class="input-container">
                <label for="kecamatan">Kecamatan <span>*</span></label>
                <select name="kecamatan" id="kecamatan" required>
                    <option value="none" selected>-- Pilih Kecamatan</option>
                    <option value="AYAH">AYAH</option>
                    <option value="BUAYAN">BUAYAN</option>
                    <option value="PURING">PURING</option>
                    <option value="PETANAHAN">PETANAHAN</option>
                    <option value="KLIRONG">KLIRONG</option>
                    <option value="BULUSPESANTREN">BULUSPESANTREN</option>
                    <option value="AMBAL">AMBAL</option>
                    <option value="MIRIT">MIRIT</option>
                    <option value="BONOROWO">BONOROWO</option>
                    <option value="PADURESO">PADURESO</option>
                    <option value="KUTOWINANGUN">KUTOWINANGUN</option>
                    <option value="ALIAN">ALIAN</option>
                    <option value="PONCOWARNO">PONCOWARNO</option>
                    <option value="KEBUMEN">KEBUMEN</option>
                    <option value="PEJAGOAN">PEJAGOAN</option>
                    <option value="SRUENG">SRUENG</option>
                    <option value="ADIMULYO">ADIMULYO</option>
                    <option value="KUWARASAN">KUWARASAN</option>
                    <option value="ROWOKELE">ROWOKELE</option>
                    <option value="SEMPOR">SEMPOR</option>
                    <option value="GOMBONG">GOMBONG</option>
                    <option value="KARANGANYAR">KARANGANYAR</option>
                    <option value="KARANGASEM">KARANGASEM</option>
                    <option value="SADANG">SADANG</option>
                    <option value="KARANGSAMBUNG">KARANGSAMBUNG</option>
                </select>
            </div>
            <div class="input-container">
                <label for="kelurahan">Kelurahan <span>*</span></label>
                <select name="kelurahan" id="kelurahan" required>
                    <option value="AYAH">AYAH</option>
                    <option value="BUAYAN">BUAYAN</option>
                    <option value="PURING">PURING</option>
                    <option value="PETANAHAN">PETANAHAN</option>
                    <option value="KLIRONG">KLIRONG</option>
                    <option value="BULUSPESANTREN">BULUSPESANTREN</option>
                    <option value="AMBAL">AMBAL</option>
                    <option value="MIRIT">MIRIT</option>
                    <option value="BONOROWO">BONOROWO</option>
                    <option value="PADURESO">PADURESO</option>
                    <option value="KUTOWINANGUN">KUTOWINANGUN</option>
                    <option value="ALIAN">ALIAN</option>
                    <option value="PONCOWARNO">PONCOWARNO</option>
                    <option value="KEBUMEN">KEBUMEN</option>
                    <option value="PEJAGOAN">PEJAGOAN</option>
                    <option value="SRUENG">SRUENG</option>
                    <option value="ADIMULYO">ADIMULYO</option>
                    <option value="KUWARASAN">KUWARASAN</option>
                    <option value="ROWOKELE">ROWOKELE</option>
                    <option value="SEMPOR">SEMPOR</option>
                    <option value="GOMBONG">GOMBONG</option>
                    <option value="KARANGANYAR">KARANGANYAR</option>
                    <option value="KARANGASEM">KARANGASEM</option>
                    <option value="SADANG">SADANG</option>
                    <option value="KARANGSAMBUNG">KARANGSAMBUNG</option>
                </select>
            </div>
            <div class="input-container">
                <label for="alamat_lengkap">Alamat Lengkap <span>*</span></label>
                <div>
                    <textarea name="alamat_lengkap" id="alamat" required></textarea>
                    <span>* Di Isi Nama Jalan, RT/RW, Dan Nomor Gedung Bila Ada</span>
                </div>
            </div>
            <input type="submit" name="register" value="Daftar" class="submit-btn btn-primary" />
        </form>
    </main>

    <script src="./js/register-page.js"></script>
</body>

</html>