<?php
if(!isset($_SESSION)) {
session_start();
}
$loggedin = false;
if(isset($_SESSION['user'])) {
    $loggedin = true;
}
?>
<nav>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/categories.php">Categories</a></li>
        <li><a href="/blog.php">Blog</a></li>
        <li><a href="/about.php">About</a></li>
        <li><a href="/contact.php">Contact</a></li>
    </ul>
    <?php
    if($loggedin) {
    ?>
    <ul class="right">
        <li><a href="/profile.php">Profile</a></li>
        <li><a href="/logout.php">Logout</a></li>
    </ul>
    <?php
    }
    else {
    ?>
    <ul class="right">
        <li><a href="/login.php">Login</a></li>
        <li><a href="/register.php">Register</a></li>
    </ul>
    <?php
    }
    ?>
</nav>