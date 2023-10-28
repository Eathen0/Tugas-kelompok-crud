<?php

function random_string(int $length) : string {
   $key = '';
   $keys = array_merge(range(0, 9), range('a', 'z'));

   for ($i = 0; $i < $length; $i++) {
      $key .= $keys[array_rand($keys)];
   }

   return $key;
}

function uploadImg(array $file, string $dirTarget, int $limitFileSize) : array {
   $target_dir = $dirTarget;
   $target_file = $target_dir . basename($file["name"]);
   $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
   $file_name = $target_dir . random_string(30) . ".$imageFileType";

   $check = getimagesize($file["tmp_name"]);
   if ($check == false) {
      return ['result' => false, 'error' => "NOT IMAGE"];
   }
   
   if (file_exists($target_file)) {
      return ['result' => false, 'error' => "FILE EXIST"];
   }
   
   if ($file["size"] > $limitFileSize) {
      return ['result' => false, 'error' => "FILE TO LARGE"];
   }
   
   if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
      return ['result' => false, 'error' => "FORMAT WRONG"];
   }

   if (move_uploaded_file($file["tmp_name"], $file_name)) {
      return ['result' => $file_name, 'error' => ""];
   } else {
      return ['result' => false, 'error' => "UPLOAD ERROR"];
   }
}
