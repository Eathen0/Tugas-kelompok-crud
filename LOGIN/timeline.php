<?php require_once("auth.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login Pengguna</title>


</head>

<body>

    <img width="160" src="./user-photo-profile/<?= $_SESSION['user-data'][4] ?>" />

    <h3><?php echo  $_SESSION["user-data"][5] ?></h3>
    <p><?php echo $_SESSION["user-data"][9] ?></p>
    <p><a href="logout.php">Logout</a></p>

</body>

</html>