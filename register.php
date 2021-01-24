<?php
session_start();
if(isset($_SESSION['user'])) {
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Blogsite - Register</title>
</head>
<body>
    <?php require_once "navbar.php";?>
    <div id="msg">Registered successfully! Login to continue<div class="progress"></div></div>
    <div class="container">
        <div class="register-form">
            <h1>Welcome to <span class="sitename">Blogsite</span></h1>
            <form onsubmit="registerSubmit()">
            <div class="input-group">
                <input type="text" class="input-control" name="fullname" id="fullname">
                <label for="fullname">Fullname</label>
                <div class="error"></div>
            </div>
            <div class="input-group">
                <input type="text" class="input-control" name="username" id="username">
                <label for="username">Username</label>
                <div class="error"></div>
            </div>
            <div class="input-group">
                <input type="text" class="input-control" name="email" id="email">
                <label for="email">Email</label>
                <div class="error"></div>
            </div>
            <div class="input-group">
                <input type="password" class="input-control" name="password" id="password">
                <label for="password">Password</label>
                <div class="error"></div>
            </div>
            <div class="input-group">
                <input type="password" class="input-control" name="confirm" id="confirm">
                <label for="confirm">Confirm Password</label>
                <div class="error"></div>
            </div>
            <button class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
    <?php require_once "footer.php";?>
    <script src="script/script.js"></script>
</body>
</html>