<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/login-page.css">
    <script src="./js/global.js" defer></script>
    <title>Login</title>
</head>

<body>

    <main class="container">
        <div class="box">
            <img class="logo" src="./img/icon.png" alt="">
            <h3>Food Amanah</h3>
            <p>Silakan masuk untuk melanjutkan</p>
            <form action="login.php" method="POST">
                <input type="text" name="username" placeholder="username" />
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

    <?php

    require_once("config.php");

    if (isset($_POST['login'])) {

        $values = valueToSqlStr(['username', 'password'], 'array')['result'];
        $sql = sprintf("SELECT * FROM `users` WHERE username='%s'", $values[0]);
        
        $query = mysqli_fetch_array(mysqli_query($db, $sql));

        if (is_array($query)) {
            
            $data = array_values(array_unique($query));
            if (password_verify($values[1], $data[6])) {
                session_start();
                $_SESSION['user-data'] = $data;
                header('location:timeline.php');
            } else {
                echo errorPopupTamplate('password salah');
            }
        
        } else {
            echo errorPopupTamplate('password atau username salah');
        }
    }

    ?>
</body>
</html>