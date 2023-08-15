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
            <?php $getProjects(); ?>
        });
    </script>


    <div style="padding: 50px">
        <h2 style="font-weight: lighter;"> Portfolio </h2>
        <div style="height: 5px; background-color: rgb(51, 51, 51);">
        </div>
    </div>

    <div class="col" style="height: 20%;">
        <div>
            <form class="form" method="POST" enctype="multipart/form-data">
                <h2 style="text-align: center;">Adicionar projeto</h2>
                <div class="input-container">
                    <h5 style="text-align: left; margin-left:10px;margin-top:10px;">Titulo do projeto</h5>
                    <input type="text" id="reason" name="reason" class="out_none form-control" required></textarea>
                </div>
                <div class="input-container">
                    <h5 style="text-align: left; margin-left:10px;margin-top:10px;">Descrição do projeto</h5>
                    <textarea type="text" id="reason" name="reason" class="out_none form-control" rows="7" cols="30"
                        required></textarea>
                </div>
                <div>
                    Select image to upload:
                    <input class="out_none form-control" type="file" name="fileToUpload" id="fileToUpload">
                    <input class="out_none form-control" type="submit" value="Upload Image" name="submit">
                </div>
                <div>
                    <input name="action" value="add_project" hidden>
                </div>

                <button type="submit" class="submit">
                    Adicionar projeto
                </button>
            </form>
        </div>
    </div>
    <div class="col form-dark">
        <?php
        if ($_SESSION['projects']) {
            ?>

            <h2>Os seus projetos:</h2>
            <div class="row projects">

                <p>
                    <?php

                    foreach ($_SESSION['projects'] as $project) {

                        $projectID = $project['id'];

                        echo
                            '<div class="project">
                                    <form class="form"  method="POST">
                                        <div class="input-container">
                                            <input type="text" name="title" id="title" class="out_none" value="' . $project['title'] . '">
                                        </div>
                                        <div class="input-container">
                                            <textarea type="text" id="description" name="description" class="out_none form-control" rows="7" cols="30">' . $project['description'] . '</textarea>
                                            </div>
                                        <input type="text" name="projectID" id="projectID" class="out_none" hidden value="' . $project['id'] . '">
                                        <br>
                                        <img style="height: 200px; width: 317px;margin-bottom:10px;" src="data:image/jpeg;base64,' . base64_encode($project['photo']) . '">
                                        <br>
                                        <input class="out_none form-control" type="number" name="completionTime" id="completionTime" class="out_none" value="' . $project['completion_time'] . '">

                                        <button name="action" value="edit_project" type="submit" class="submit">
                                                Editar projeto
                                        </button>
                                        <button name="action" value="delete_project" type="submit" class="submit">
                                            Eliminar projeto
                                        </button>
                                    </form>
                                </div>';

                    }
                    ?>

                </p>
            </div>
            <?php
        } else {
            ?>
            <h2>Não tem projetos guardados</h2>
            <?php
        }

        ?>



        <?php
        require('sidebar.php');

        ?>
</body>

</html>