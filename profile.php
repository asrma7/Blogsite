<?php
session_start();
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
else {
    header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>My Profile - <?php echo $user['fullname'];?></title>
</head>
<body>
    <?php require_once "navbar.php";?>
    <div class="container">
        <div class="center-flex">
            <div class="profile-view">
                <div class="dp">
                    <img src="<?php echo $user['dp']??"resources/images/placeholderuser.png";?>" alt="userdp" id="dp">
                    <input type="file" name="dpinput" id="dpinput">
                </div>
                <table class="details">
                    <tr class="userdetail"><td class="title">Fullname</td><td class="value"><?php echo $user['fullname'];?></td></tr>
                    <tr class="userdetail"><td class="title">Username</td><td class="value"><?php echo $user['username'];?></td></tr>
                    <tr class="userdetail"><td class="title">Email</td><td class="value"><?php echo $user['email'];?></td></tr>
                </table>
            </div>
        </div>
    </div>
    <?php require_once "footer.php";?>
    <script src="script/script.js"></script>
</body>
</html>