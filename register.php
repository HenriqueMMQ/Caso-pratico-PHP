<?php
session_start();
require('api.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    require('./starter-scripts/jquery.html');
    require('./starter-scripts/fancybox.html');
    require('./starter-scripts/mapbox.html');
    require('./starter-scripts/bootstrap.html');
    ?>

    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/login_style.css">

    <script src="script.js"></script>

    <title>Register</title>
    <style>

    </style>
</head>

<body class="background">



    <form class="form" method="POST" onsubmit="return validate_register(this)">
        <p class="form-title">Register now</p>
        <div class="input-container">
            <input type="text" name="name" id="name" placeholder="Enter your name" onkeyup="user_validation(this)">
        </div>
        <div class="input-container">
            <input type="text" name="username" id="username" placeholder="Enter your username"
                onkeyup="nick_validation(this)">
        </div>
        <div class="input-container">
            <input type="email" name="email" id="email" placeholder="Enter email" onchange="email_validation(this)">
        </div>
        <div class="input-container">
            <input type="password" name="password" id="password" placeholder="Enter password"
                onchange="password_validation(this)">
        </div>
        <div>
            <input name="action" value="register" hidden>
        </div>
        <button type="submit" class="submit">
            Register
        </button>

        <p class="signup-link">
            Already registered?
            <a href="login.php">Login</a>
        </p>
    </form>
    <?php
    require('sidebar.php');

    ?>
</body>

</html>