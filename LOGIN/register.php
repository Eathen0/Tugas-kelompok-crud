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

        <?php
            require_once("config.php");

            if (isset($_POST['register'])) {
                $date = new DateTime();
                $values = valueToSqlStr($FORM_USERS_ATRIBUTES, 'string', 'password', 'rePassword', 'foto_ktp', 'user-photo-profile/');
                if ($values['result']) {
                    try {
                        mysqli_query($db, sprintf("INSERT INTO users (%s) VALUES (%s, '%d')", $STR_USERS_ATRIBUTES, $values['result'], 1));
                        header('location:login.php');
                    }
                    catch (Exception $err) {
                        if (file_exists($values['imgFileName'])) unlink($values['imgFileName']);
                        echo errorPopupTamplate($err->getMessage());
                    }
                } else {
                    echo errorPopupTamplate($values['error']);
                }
            }
        ?>

        <form action="register.php" method="POST" enctype="multipart/form-data">
            <div class="input-container">
                <label for="<?= $FORM_USERS_ATRIBUTES[0]; ?>">Nama Market <span>*</span></label>
                <input type="text" name="<?= $FORM_USERS_ATRIBUTES[0]; ?>" placeholder="Masukan Nama Market" required />
            </div>
            <div class="input-container">
                <label for="<?= $FORM_USERS_ATRIBUTES[1]; ?>">Nama Pemilik <span>*</span></label>
                <input type="text" name="<?= $FORM_USERS_ATRIBUTES[1]; ?>" placeholder="Masukan nama lengkap" required />
            </div>
            <div class="input-container">
                <label for="<?= $FORM_USERS_ATRIBUTES[2]; ?>">NIK/No. KTP <span>*</span></label>
                <input type="number" pattern="[1-9]{16}" name="<?= $FORM_USERS_ATRIBUTES[2]; ?>"  placeholder="Masukan NIK / No.KTP" required />
            </div>
            <div class="input-container">
                <label for="<?= $FORM_USERS_ATRIBUTES[3]; ?>">Foto KTP <span>*</span></label>
                <div class="inp-ktp" id="input-foto-container">
                    <img class="img-preview" src="" alt="">
                    <input type="file" accept="image/*" name="<?= $FORM_USERS_ATRIBUTES[3]; ?>" id="input-foto" required />
                    <p id="file-name">Upload Foto</p>
                </div>
            </div>
            <div class="input-container">
                <label for="<?= $FORM_USERS_ATRIBUTES[4]; ?>">Username <span>*</span></label>
                <input type="text" name="<?= $FORM_USERS_ATRIBUTES[4]; ?>" placeholder="Digunakan untuk login" required />
            </div>
            <div class="input-container">
                <label for="<?= $FORM_USERS_ATRIBUTES[5]; ?>">Password <span>*</span></label>
                <input type="password" name="<?= $FORM_USERS_ATRIBUTES[5]; ?>" placeholder="Masukan password" required />
            </div>
            <div class="input-container">
                <label for="rePassword">Repassword <span>*</span></label>
                <input type="password" name="rePassword" placeholder="Masukan kembali password" required />
            </div>
            <div class="input-container">
                <label for="<?= $FORM_USERS_ATRIBUTES[6]; ?>">No.Telepon/HP <span>*</span></label>
                <input type="number" name="<?= $FORM_USERS_ATRIBUTES[6]; ?>" placeholder="Masukan No. Telepon" required />
            </div>
            <div class="input-container">
                <label for="<?= $FORM_USERS_ATRIBUTES[7]; ?>">No. WhatsApp <span>*</span></label>
                <input type="text" name="<?= $FORM_USERS_ATRIBUTES[7]; ?>" placeholder="Masukan kembali WhasApp" required />
            </div>
            <div class="input-container">
                <label for="<?= $FORM_USERS_ATRIBUTES[8]; ?>">Email <span>*</span></label>
                <input type="email" name="<?= $FORM_USERS_ATRIBUTES[8]; ?>" placeholder="Masukan Email Aktif" required />
            </div>
            <div class="input-container">
                <label for="<?= $FORM_USERS_ATRIBUTES[9]; ?>">Legalitas Market <span>*</span></label>
                <div>
                    <textarea name="<?= $FORM_USERS_ATRIBUTES[9]; ?>" id="legalitas" required></textarea>
                    <span>* Di Isi legalitas Market Seperti SIUP, SKDP, TDP, dan lain-lain Bila Ada</span>
                </div>
            </div>
            <div class="input-container">
                <label for="<?= $FORM_USERS_ATRIBUTES[10]; ?>">Kecamatan <span>*</span></label>
                <select name="<?= $FORM_USERS_ATRIBUTES[10]; ?>" id="kecamatan" required>
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
                <label for="<?= $FORM_USERS_ATRIBUTES[11]; ?>">Kelurahan <span>*</span></label>
                <select name="<?= $FORM_USERS_ATRIBUTES[11]; ?>" id="kelurahan" required>
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
                <label for="<?= $FORM_USERS_ATRIBUTES[12]; ?>">Alamat Lengkap <span>*</span></label>
                <div>
                    <textarea name="<?= $FORM_USERS_ATRIBUTES[12]; ?>" id="alamat" required></textarea>
                    <span>* Di Isi Nama Jalan, RT/RW, Dan Nomor Gedung Bila Ada</span>
                </div>
            </div>

            <p><i>Sudah punya akun ?</i></p>
            <div class="btn-container">
                <a href="login.php" class="btn login-btn">Masuk</a>
                <input type="submit" name="register" value="Daftar" class="submit-btn btn-primary" />
            </div>
        </form>
    </main>

    <footer>

    </footer>

    <script src="./js/global.js"></script>
    <script src="./js/register-page.js"></script>
</body>

</html>