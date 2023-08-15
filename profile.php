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

    <script src="script.js"></script>

    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/login_style.css">

    <title>Perfil</title>

</head>

<body style="background-color: #c4c4c4;" class="">

    <div style="text-align:center; padding: 1%">
        <h2 style="font-weight: lighter;"> Perfil </h2>
        <h3 style="font-weight: lighter; text-transform: capitalize;" name="user">Olá,
            <?php echo $_SESSION['user']['name'] . $_SESSION['user']['admin'];
            ?>
        </h3>
        <h4 id="time">
            <?php
            $timezone = date_default_timezone_get();
            date_default_timezone_set($timezone);
            $date = new DateTime();
            $result = $date->format('d/m/Y');
            echo $result .
                "
                <div id='current-time'></div>
                <script>

                  setInterval(function() {

                    let date1 = new Date();

                    let hours = date1.getHours().toString();
                    let minutes = ('0'+date1.getMinutes()).slice(-2);
                    let seconds = ('0'+date1.getSeconds()).slice(-2);

                    document.getElementById('current-time').innerHTML = hours.concat(':', minutes, ':', seconds);
                  }, 1000);
                </script>
                ";
            ;

            ?>
        </h4>
        <div style="height: 5px; background-color: rgb(51, 51, 51);"></div>
    </div>



    <div class="container text-center">
        <div class="row">

            <div class="col" style="height: 20%;">
                <form class="form" method="POST">
                    <div class="input-container">
                        <h2 style="text-align: center;">Dados do Utilizador</h2>
                        <input type="text" name="name" id="name" placeholder="Nome"
                            value="<?php echo $_SESSION['user']['name'] ?>" required>
                    </div>
                    <div class="input-container">
                        <input type="text" name="surname" id="surname" placeholder="Sobrenome"
                            value="<?php echo $_SESSION['user']['surname'] ?>" required>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" id="email" placeholder="Email"
                            value="<?php echo $_SESSION['user']['email'] ?>" required>
                    </div>
                    <div class="input-container">
                        <input type="tel" name="phone" id="phone" placeholder="Telemóvel"
                            value="<?php echo $_SESSION['user']['phone'] ?>">
                    </div>
                    <div>
                        <input name="action" value="update_user" hidden>
                    </div>
                    <button type="submit" class="submit">
                        Guardar dados
                    </button>
                </form>
            </div>






        </div>
    </div>
    <?php
    include('sidebar.php');
    ?>
</body>

</html>