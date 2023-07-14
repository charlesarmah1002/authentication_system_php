<?php
session_start();
include 'autoLoader.php';

// declaration of variables
$errormsg = null;
$user = new User;

$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (isset($_SESSION['user_id'])) {
    header('location: index.php');
}

if (isset($_POST['create_account'])) {
    if (!empty($firstnama) || !empty($lastname) || !empty($username) || !empty($email) || !empty($password) || !empty($confirm_password)) {
        if ($user->check_username($username) === true) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($user->check_email($email) === true) {
                    if ($password === $confirm_password) {
                        $user->create_account($firstname, $lastname, $username, $email, $password);
                        session_unset();
                        header('location: login.php');
                    } else {
                        $errormsg = "Passwords do not match";
                    }
                } else {
                    $errormsg = "Email used by another user";
                }
            } else {
                $errormsg = "Please enter a valid email address";
            }
        } else {
            $errormsg = "Username unavailable";
        }
    } else {
        $errormsg = "Please fill all fields";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akatsuki | Register</title>

    <!-- custom css -->
    <link rel="stylesheet" href="css/forms.css">
</head>

<body>
    <div class="form-field">
        <h1 class="form-title">Create Account</h1>
        <p class="errormsg">
            <?= $errormsg; ?>
        </p>
        <form action="<?= $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
            <div class="field">
                <input type="text" name="firstname" id="firstname" placeholder="Firstname" autofocus>
            </div>
            <div class="field">
                <input type="text" name="lastname" id="lastname" placeholder="Lastname">
            </div>
            <div class="field">
                <input type="text" name="username" id="username" placeholder="Username">
            </div>
            <div class="field">
                <input type="text" name="email" id="email" placeholder="Email">
            </div>
            <div class="field">
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <div class="field">
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
            </div>
            <input type="submit" value="Done" name="create_account" id="create_account">
            <p><strong>Already have an account?</strong> <a href="login.php">Log In</a></p>
        </form>
    </div>
</body>

</html>