<?php
require_once "dbconnect.php";
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$success = false;

if (strlen($username) < 6) {
    $error = "Username must be atleast 6 characters.";
    $field = "username";
}
if (strlen($password) < 8) {
    $error = "Password must be atleast 8 characters.";
    $field = "password";
}
if (empty($fullname)) {
    $error = "Fullname is required.";
    $field = "fullname";
}
if (empty($email)) {
    $error = "Email is required.";
    $field = "email";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Email is not valid.";
    $field = "email";
}
if (!isEmailUnique($email)) {
    $error = "Email already exists.";
    $field = "email";
}
if (!isUsernameUnique($username)) {
    $error = "Username already exists.";
    $field = "username";
}
if (!isset($error)){
    $encryptedpass = password_hash($password, PASSWORD_DEFAULT);
    $field = "email";
    $sql = "INSERT INTO users (fullname, username, email, password) VALUES (:fullname, :username, :email, :password)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $encryptedpass);
    $stmt->execute();
    $success = true;
}
$response = $success?['success'=>$success]:['success'=>$success, 'error'=>$error, 'field'=>$field];
echo json_encode($response);

function isEmailUnique($email) {
    global $db;
    $stmt = $db->prepare("SELECT COUNT(*) AS count FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data['count'] == 0;
}
function isUsernameUnique($username) {
    global $db;
    $stmt = $db->prepare("SELECT COUNT(*) AS count FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data['count'] == 0;
}
?>