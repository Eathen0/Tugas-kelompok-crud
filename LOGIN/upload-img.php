<?php

function uploadImg(mixed $imgFile, string $dirTarget) : void {
   $target_dir = $dirTarget;
   $target_file = $target_dir . basename($imgFile["imageFile"]["name"]);
   // $uploadOk = 1;
   // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

   var_dump($imgFile);
   echo '<br>';
   var_dump($dirTarget);
   echo '<br>';
   echo '<br>';
   echo '<br>';
   
   
   // // Check if image file is a actual image or fake image
   // $check = getimagesize($imgFile["imageFile"]["tmp_name"]);
   // if ($check !== false) {
   //    echo "File is an image - " . $check["mime"] . ".";
   //    $uploadOk = 1;
   // } else {
   //    echo "File is not an image.";
   //    $uploadOk = 0;
   // }
   
   // // Check if file already exists
   // if (file_exists($target_file)) {
   //    echo "Sorry, file already exists.";
   //    $uploadOk = 0;
   // }
   
   // // Check file size
   // if ($imgFile["imageFile"]["size"] > 500000) {
   //    echo "Sorry, your file is too large.";
   //    $uploadOk = 0;
   // }
   
   // // Allow certain file formats
   // if (
   //    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   //    && $imageFileType != "gif"
   // ) {
   //    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
   //    $uploadOk = 0;
   // }
   
   // // Check if $uploadOk is set to 0 by an error
   // if ($uploadOk == 0) {
   //    echo "Sorry, your file was not uploaded.";
   //    return false;
   //    // if everything is ok, try to upload file
   // } else {
   //    if (move_uploaded_file($imgFile["imageFile"]["tmp_name"], $target_file)) {
   //       return $imgFile["imageFile"]["tmp_name"];
   //       echo "The file " . htmlspecialchars(basename($imgFile["imageFile"]["name"])) . " has been uploaded.";
   //    } else {
   //       echo "Sorry, there was an error uploading your file.";
   //       return false;
   //    }
   // }
}
