<?php
if (isset($_POST['submit'])) {
   var_dump($_FILES['img']);
   // echo "<br>" . $_POST['img']; // Ini baris tidak diperlukan karena Anda mengunggah gambar, bukan teks
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <form action="test.php" method="post" enctype="multipart/form-data">
      <input type="file" name="img" id="img">
      <input type="submit" value="submit" name="submit">
   </form>
</body>

</html>