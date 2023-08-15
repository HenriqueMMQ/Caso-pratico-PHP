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
<script>
        $(document).ready(function () {
            <?php $getAppointments(); ?>
        });
    </script>

    <div style="padding: 50px">
        <h2 style="font-weight: lighter;"> Consultas </h2>
        <div style="height: 5px; background-color: rgb(51, 51, 51);">
        </div>
    </div>


    <div class="col" style="height: 20%;">
                <div>
                    <form class="form" method="POST">
                        <h2 style="text-align: center;">Solicitar consulta</h2>
                        <div class="input-container">
                            <input type="date" name="date" id="date" class="out_none form-control" required>
                        </div>
                        <div class="input-container">
                            <h5 style="text-align: left; margin-left:10px;margin-top:10px;">Motivo da Consulta:</h5>
                            <textarea type="text" id="reason" name="reason" class="out_none form-control" rows="7"
                                cols="30" required></textarea>
                        </div>
                        <div>
                            <input name="action" value="add_appointment" hidden>
                        </div>
                        <button type="submit" class="submit">
                            Marcar consulta
                        </button>
                    </form>
                </div>
            </div>


        </div>
        <div class="col form-dark">
            <?php
            if ($_SESSION['appointments']) {
                ?>

                <h2>As suas consultas:</h2>
                <div class="row appointments">

                    <p>
                        <?php

                        foreach ($_SESSION['appointments'] as $appointment) {

                            $appointmentID = $appointment['id'];

                            echo
                                '<div class="appointment">
                                    <form class="form"  method="POST">
                                        <div class="input-container">
                                            <input type="date" name="date" id="date" class="out_none" value="' . $appointment['date'] . '">
                                        </div>
                                        <div class="input-container">
                                            <input type="text" name="reason" id="reason" class="out_none" value="' . $appointment['reason'] . '">
                                        </div>
                                        <input type="text" name="appointmentID" id="appointmentID" class="out_none" hidden value="' . $appointment['id'] . '">
                                        <button name="action" value="edit_appointment" type="submit" class="submit">
                                            Editar consulta
                                        </button>
                                        <button name="action" value="delete_appointment" type="submit" class="submit">
                                            Desmarcar consulta
                                        </button>
                                    </form>
                                </div>';

                            /* $date = date_format(date_create($appointment['date']), "Y/m/d"); */
                        }
                        ?>

                    </p>
                </div>
                <?php
            } else {
                ?>
                <h2>Não tem consultas marcadas:</h2>
                <?php
            }

            ?>
    


    <?php
    require('sidebar.php');

    ?>
</body>

</html>