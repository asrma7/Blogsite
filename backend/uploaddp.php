<?php
session_start();
require_once "dbconnect.php";
$user = $_SESSION['user'];
$file = $_FILES['file'];
$target_dir = "/uploads/user/";
$target_file = $target_dir . $user['username'].'.'.pathinfo($file['name'])['extension'];
if(!empty($file)){
  if (move_uploaded_file($file["tmp_name"], "..".$target_file)) {
    $_SESSION['user']['dp'] = $target_file;
    $stmt = $db->prepare("UPDATE users SET dp = :dp WHERE id = :id");
    $stmt->bindParam(':dp', $target_file);
    $stmt->bindParam(':id', $user['id']);
    $stmt->execute();
    echo json_encode(['success'=>true]);
  } else {
    echo json_encode(['success'=>false]);
  }
}
?>