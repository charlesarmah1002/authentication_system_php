<?php 
session_start();
include "autoLoader.php";

// declaration of variables
$errormsg = null;
$user = new User;

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if(isset($_SESSION['user_id'])){
    header('location: home.php');
}

if (isset($_POST['login'])) {
    if (!empty($username) || !empty($password)) {
        # code...
        if ($user->check_username($username) === false) {
            $qc_pass = $user->log_in($username, $password);
            if($qc_pass['state'] === 'takeoff'){
                $_SESSION['user_id'] = $qc_pass['user_id'];
                $_SESSION['firstname'] = $qc_pass['firstname'];
                $_SESSION['lastname'] = $qc_pass['lastname'];
                $_SESSION['email'] = $qc_pass['email'];
                $_SESSION['role'] = $qc_pass['role'];
                $_SESSION['status'] = $qc_pass['status'];
                $_SESSION['username'] = $qc_pass['username'];
                header('location: home.php');
            }else {
                $errormsg = "the flight was grounded";
            }
        }else{
            $errormsg = "User account doesn't exist";
        }
    }else {
        $errormsg = "Please fill all fields";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akatsuki | Login</title>

    <!-- custom css -->
    <link rel="stylesheet" href="css/forms.css">
</head>
<body>
<div class="form-field">
        <h1 class="form-title">Log In</h1>
        <hr>
        <p class="errormsg">
            <?= $errormsg; ?>
        </p>
        <form action="<?= $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
            <div class="field">
                <input type="text" name="username" id="username" placeholder="Username" autofocus>
            </div>
            <div class="field">
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <input type="submit" value="Log In" name="login" id="login">
            <p><strong>Don't have an account?</strong> <a href="register.php">Create Account</a></p>
        </form>
    </div>
</body>
</html>