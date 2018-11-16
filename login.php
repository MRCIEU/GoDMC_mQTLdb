<?php
$user = null;
$pass = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST["user"]) && !empty($_POST["pass"])) {
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        if($user == 'godmc' && $pass == 'GreatestHits1') {
            session_start();
            $_SESSION["authenticated"] = 'true';
            header('Location: index.php');
        }
        else {
            header('Location: login.php');
        }
    } else {
        header('Location: login.php');
    }
} else {
?>
<?php 
include 'header.php';
?>
<h1>Login</h1>
<form id="login" method="post">
    <br />
    <label for="user">Username:</label>
    <input id="user" name="user" type="text" required>
    <label for="pass">Password:</label>
    <input id="pass" name="pass" type="password" required>                    
    <br />
    <input type="submit" value="Login">
</form>
<?php } ?>

<?php 
include 'footer.php';
?>