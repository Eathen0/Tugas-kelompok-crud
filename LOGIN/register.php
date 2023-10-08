<?php

require_once("config.php");

$sql = sprintf("
INSERT INTO users (
    %s ,%s ,%s ,%s ,%s ,%s ,%s ,%s ,%s ,%s ,%s ,%s, ,%s
) 
VALUES (
    :%s, :%s, :%s, :%s, :%s, :%s, :%s, :%s, :%s, :%s, :%s, :%s, :%s
)", $DATA[1], $DATA[2], $DATA[3], $DATA[4], $DATA[5], $DATA[6], $DATA[7], $DATA[8], $DATA[9], $DATA[10], $DATA[11], $DATA[12], $DATA[13]
, $DATA[1], $DATA[2], $DATA[3], $DATA[4], $DATA[5], $DATA[6], $DATA[7], $DATA[8], $DATA[9], $DATA[10], $DATA[11], $DATA[12], $DATA[13]
);

echo $sql;

// foreach ($db->query('SELECT * FROM users') as $item) {
//     echo $item;
// }

if (isset($_POST['register'])) {

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', HTML_SPECIALCHARS);
    $username = filter_input(INPUT_POST, 'username', HTML_SPECIALCHARS);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = sprintf("INSERT INTO users (
                %s ,%s ,%s ,%s ,%s ,%s ,%s ,%s ,%s ,%s ,%s ,%s
            ) 
            VALUES (
                :%s, :%s, :%s, :%s, :%s, :%s, :%s, :%s, :%s, :%s, :%s, :%s,
            )", $DATA[0], $DATA[1], $DATA[2], $DATA[3], $DATA[4], $DATA[5], $DATA[6], $DATA[7], $DATA[8], $DATA[9], $DATA[10], $DATA[11]);
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
    if ($saved) {
        header("Location: login.php");
    }
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
    
    <nav>
        <a href="index.php">
            <img src="https://blonjo.kebumenkab.go.id/assets/images/logo.png" alt="" class="logo">
        </a>
        <div>
            <a href="register.php" class="btn btn-secondary">Daftar</a>
            <a href="login.php" class="btn btn-primary">Masuk</a>
        </div>
    </nav>

    <main class="container">
        <img class="logo" src="https://blonjo.kebumenkab.go.id/images/logos/f07391abe267823e8af5eb69cd26585c.png" alt="">
        <h2 class="judul-form">PENDAFTARAN</h2>

        <form action="register.php" method="POST">
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
                    <!-- <img class="img-preview" src="./img/code.png" alt=""> -->
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
                    <textarea name="legalitas" id="legalitas_market" required></textarea>
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
                    <option value="KARANGAASEM">KARANGAASEM</option>
                    <option value="SEDANG">SEDANG</option>
                    <option value="KARANGSAMBUNG">KARANGSAMBUNG</option>
                </select>
            </div>
            <div class="input-container">
                <label for="kelurahan">Kelurahan <span>*</span></label>
                <select name="kelurahan" id="kelurahan" required>
                    <option value="AYAH">AYAH</option>
                    <option value="CANDIRENGGO">CANDIRENGGO</option>
                    <option value="MANGUNWENI">MANGUNWENI</option>
                    <option value="TLOGOSARI">TLOGOSARI</option>
                    <option value="KALIBANGKANG">KALIBANGKANG</option>
                    <option value="WATUKELIR">WATUKELIR</option>
                    <option value="KALIPOH">KALIPOH</option>
                    <option value="ARGOSARI">ARGOSARI</option>
                    <option value="BANJARHARJO">BANJARHARJO</option>
                    <option value="ARGOPENI">ARGOPENI</option>
                    <option value="KARANGDUWUR">KARANGDUWUR</option>
                    <option value="SRATI">SRATI</option>
                    <option value="JINTUNG">JINTUNG</option>
                    <option value="PASIR">PASIR</option>
                    <option value="JATIJAJAR">JATIJAJAR</option>
                    <option value="DEMANGSARI">DEMANGSARI</option>
                    <option value="KEDUNGWARU">KEDUNGWARU</option>
                    <option value="BULUREJO">BULUREJO</option>
                </select>
            </div>
            <div class="input-container">
                <label for="alamat_lengkap">Alamat Lengkap <span>*</span></label>
                <div>
                    <textarea name="alamat_lengkap" id="alamat" required></textarea>
                    <span>* Di Isi Nama Jalan, RT/RW, Dan Nomor Gedung Bila Ada</span>
                </div>
            </div>
            <input type="submit" name="register" value="Daftar" class="submit-btn" />
        </form>
    </main>

    <script src="./js/register-page.js"></script>
</body>

</html>