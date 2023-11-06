<?php

function random_string(int $length) : string {
   $key = '';
   $rndNumber = '';
   for ($i = 0; $i < $length; $i++) {
      $rndNumber .= array_rand(range(0, 9));
   }
   $key = 'photo-' . time() . '-' . $rndNumber;

   return $key;
}

function uploadImg(array $file, string $dirTarget, int $limitFileSize) : array {
   $target_dir = $dirTarget;
   $target_file = $target_dir . basename($file["name"]);
   $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
   $file_name = random_string(5) . ".$imageFileType";

   $check = getimagesize($file["tmp_name"]);
   if ($check == false) {
      return ['result' => false, 'error' => "FILE BUKAN GAMBAR"];
   }
   
   // if file name is exist
   while (file_exists($file_name)) {
      $file_name = random_string(5) . ".$imageFileType";
   }
   
   if ($file["size"] > $limitFileSize) {
      return ['result' => false, 'error' => "UKURAN GAMBAR MELEBIHI " . $limitFileSize / 1000000 . "MB"];
   }
   
   if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
      return ['result' => false, 'error' => "FORMAT GAMBAR TIDAK DI SUPORT"];
   }

   if (move_uploaded_file($file["tmp_name"], $target_dir . $file_name)) {
      return ['result' => $file_name, 'error' => ""];
   } else {
      return ['result' => false, 'error' => "KESALAHAN TIDAK TERDUGA"];
   }
}
