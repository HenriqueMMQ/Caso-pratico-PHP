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

    <title>Perfil</title>

</head>

<body style="background-color: #c4c4c4;" class="">



    <div style="padding: 50px">
        <h2 style="font-weight: lighter;"> Portfolio </h2>
        <div style="height: 5px; background-color: rgb(51, 51, 51);">
        </div>
    </div>



    


    <?php
    require('sidebar.php');

    ?>
</body>

</html>