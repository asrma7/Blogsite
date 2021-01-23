<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Blogsite - Login</title>
</head>
<body>
    <?php require_once "navbar.php";?>
    <div class="container">
        <div class="register-form">
            <h1>Welcome to <span class="sitename">Blogsite</span></h1>
            <form onsubmit="loginSubmit()">
            <div class="input-group">
                <input type="text" class="input-control" name="user" id="user">
                <label for="user">Username/Email</label>
                <div class="error"></div>
            </div>
            <div class="input-group">
                <input type="password" class="input-control" name="password" id="password">
                <label for="password">Password</label>
                <div class="error"></div>
            </div>
            <div class="input-checkbox">
                <input type="checkbox" class="input-control" name="keeploggedin" id="keeploggedin">
                <label for="keeploggedin"> Keep me logged in</label>
                <div class="error"></div>
            </div>
            <div class="forgotpass">
                <a href="forgetpass.php">Forgot your password?</a>
            </div>
            <button class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
    <?php require_once "footer.php";?>
    <script src="script/script.js"></script>
</body>
</html>