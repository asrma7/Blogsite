<?php
require_once "dbconnect.php";
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$success = false;
$errors = [];

if (strlen($username) < 6) {
    $errors += ["username" => "Username must be atleast 6 characters."];
}
if (!isUsernameUnique($username)) {
    $errors += ["username" => "Username already exists."];
}
if (strlen($password) < 8) {
    $errors += ["password" => "Password must be atleast 8 characters."];
}
if (empty($fullname)) {
    $errors += ["fullname" => "Fullname is required."];
}
if (empty($email)) {
    $errors += ["email" => "Email is required."];
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors += ["email" => "Email is not valid."];
}
if (!isEmailUnique($email)) {
    $errors += ["email" => "Email already exists."];
}
if (count($errors)==0){
    $encryptedpass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (fullname, username, email, password) VALUES (:fullname, :username, :email, :password)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $encryptedpass);
    $stmt->execute();
    $success = true;
}
$response = $success?['success'=>$success]:['success'=>$success, 'errors'=>$errors];
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