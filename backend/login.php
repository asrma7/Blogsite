<?php
require_once "dbconnect.php";
session_start();
$user = $_POST['user'];
$password = $_POST['password'];
$keeploggedin = $_POST['keeploggedin'];
$stmt = $db->prepare('SELECT * FROM users WHERE username = :user OR email = :user');
$stmt->bindParam(':user', $user);
$stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);
$success = false;
if($userData == null) {
    $error = "Username/Email does not exists.";
    $field = "user";
}
else if(!password_verify($password, $userData['password'])) {
    $error = "Username/Email and password does not match.";
    $field = "password";
}
else {
    $success = true;
    $_SESSION['user'] = $userData;
}
$response = $success?['success'=>$success]:['success'=>$success, 'error'=>$error, 'field'=>$field];
echo json_encode($response);
?>