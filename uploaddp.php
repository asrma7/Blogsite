<?php
    session_start();
    $user = $_SESSION['user'];
    $file = $_FILES['file'];
    $target_dir = "uploads/user/";
    $target_file = $target_dir . $user['username'].'.'.pathinfo($file['name'])['extension'];
    $tmpFile = $file["tmp_name"];
    if (move_uploaded_file($tmpFile, $target_file)) {
        echo "The file has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
?>