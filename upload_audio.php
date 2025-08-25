<?php
$target_dir = "audio_uploads/"; // directory where audio files will be uploaded
$target_file = $target_dir . basename($_FILES["audioFile"]["name"]);
$uploadOk = 1;
$audioFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size (e.g., 10MB)
if ($_FILES["audioFile"]["size"] > 10000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain audio file formats
if($audioFileType != "mp3" && $audioFileType != "wav" && $audioFileType != "ogg" ) {
  echo "Sorry, only MP3, WAV, and OGG files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["audioFile"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
