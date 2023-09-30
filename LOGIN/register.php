<?php

require_once("config.php");

if (isset($_POST['register'])) {

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', HTML_SPECIALCHARS);
    $username = filter_input(INPUT_POST, 'username', HTML_SPECIALCHARS);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO users (name, username, email, password) 
            VALUES (:name, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if ($saved)
        header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/register-page.css">
    <title>Daftar</title>
</head>

<body>
    <p>&larr; <a href="index.php">Home</a> | <a href="login.php">Login di sini</a>

    <main class="container">
        <img class="logo" src="https://blonjo.kebumenkab.go.id/images/logos/f07391abe267823e8af5eb69cd26585c.png" alt="">
        <h2 class="judul-form">PENDAFTARAN</h2>

        <form action="" method="POST">
            <div class="input-container">
                <label for="namaMarket">Nama Market <span>*</span></label>
                <input type="text" name="namaMarket" placeholder="Masukan Nama Market" required />
            </div>
            <div class="input-container">
                <label for="namaPemilik">Nama Pemilik <span>*</span></label>
                <input type="text" name="namaPemilik" placeholder="Masukan nama lengkap" required />
            </div>
            <div class="input-container">
                <label for="nik">NIK/No. KTP <span>*</span></label>
                <input type="text" name="nik" placeholder="Masukan NIK / No.KTP" required />
            </div>
            <div class="input-container">
                <label for="fotoKtp">Foto KTP <span>*</span></label>
                <div class="inp-ktp" id="input-foto-container">
                    <input type="file"  accept="image/*" name="fotoKtp" id="input-foto" required />
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
                <label for="noTelephone">No.Telepon/HP <span>*</span></label>
                <input type="number" name="noTelephone" placeholder="Masukan No. Telepon" required />
            </div>
            <div class="input-container">
                <label for="noWhastApp">No. WhatsApp <span>*</span></label>
                <input type="text" name="noWhastApp" placeholder="Masukan kembali WhasApp" required />
            </div>
            <div class="input-container">
                <label for="email">Email <span>*</span></label>
                <input type="email" name="email" placeholder="Masukan Email Aktif" required />
            </div>
            <div class="input-container">
                <label for="legalitas">Legalitas Market <span>*</span></label>
                <textarea name="legalitas" id="legalitas" required></textarea>
            </div>
            <div class="input-container">
                <label for="kecamatan">Kecamatan <span>*</span></label>
                <select  name="kecamatan" id="kecamatan" required>
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
                    <option value="KARANGAASEM">KARANGAASEM</option>
                    <option value="SEDANG">SEDANG</option>
                    <option value="KARANGSAMBUNG">KARANGSAMBUNG</option>
                </select>
            </div>
            <div class="input-container">
                <label for="kelurahan">Kelurahan <span>*</span></label>
                <select  name="kelurahan" id="kelurahan" required>
                    <option value="none" selected>-- Pilih kelurahan</option>
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
                    <option value="KARANGAASEM">KARANGAASEM</option>
                    <option value="SEDANG">SEDANG</option>
                    <option value="KARANGSAMBUNG">KARANGSAMBUNG</option>
                </select>
            </div>
            <div class="input-container">
                <label for="alamat">Alamat Lengkap <span>*</span></label>
                <textarea name="alamat" id="alamat" required></textarea>
            </div>
            <input type="submit" name="register" value="Daftar" />
        </form>
    </main>

    <script src="./js/register.js"></script>
</body>

</html>