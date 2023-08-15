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
    require('./starter-scripts/bootstrap.html');
    require('./starter-scripts/jquery.html');
    require('./starter-scripts/fancybox.html');
    require('./starter-scripts/mapbox.html');
    ?>
    <script src="script.js"></script>

    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/login_style.css">

    <title>Login</title>
    <style>

    </style>
</head>

<body class="background">



    <form class="form" method="POST" onsubmit="return validate_login(this)">
        <p class="form-title">Sign in to your account</p>
        <div class="input-container">
            <input type="text" name="email" id="email" placeholder="Enter email or username" required>

        </div>
        <div class="input-container">
            <input type="password" id="password" name="password" placeholder="Enter password" required>
        </div>

        <button type="submit" class="submit">
            Sign in
        </button>

        <p class=""> No account?
            <a href="register.php">Sign up</a>
        </p>
        <div>
            <input name="action" value="login" hidden>
        </div>
    </form>
    <?php
    require('sidebar.php');

    ?>
</body>

</html>