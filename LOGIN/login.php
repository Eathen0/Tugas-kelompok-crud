<?php

require_once("config.php");

if (isset($_POST['login'])) {

    $username = filter_input(INPUT_POST, 'username', HTML_SPECIALCHARS);
    $password = filter_input(INPUT_POST, 'password', HTML_SPECIALCHARS);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if ($user) {
        // verifikasi password
        if (password_verify($password, $user["password"])) {
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: timeline.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/login-page.css">
    <title>Login</title>
</head>

<body>
    <main class="container">
        <div class="box">
            <img class="logo" src="./img/icon.png" alt="">
            <h3>Food Amanah</h3>
            <p>Silakan masuk untuk melanjutkan</p>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Nama Pengguna" />
                <input type="password" name="password" placeholder="Kata Sandi" />
                <div>
                    <div>
                        <input type="checkbox" name="remember" id="">
                        <label for="remember">Ingat Saya</label>
                    </div>
                    <input class="btn btn-primary" type="submit" name="login" value="Masuk" />
                </div>
            </form>
            <div>
                <p>Belum punya akun?</p>
                <a href="register.php">Daftar</a>
            </div>
        </div>
    </main>
</body>

</html>