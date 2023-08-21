<?php
session_start();
require('api.php');
$user_admin = $_SESSION['user']['admin'];
if ($user_admin == 1) {
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
                        <input type="text" id="title" name="title" class="out_none form-control" required></textarea>
                    </div>
                    <div class="input-container">
                        <h5 style="text-align: left; margin-left:10px;margin-top:10px;">Descrição do projeto</h5>
                        <textarea type="text" id="description" name="description" class="out_none form-control" rows="7"
                            cols="30" required></textarea>
                    </div>
                    <div>
                        Select image to upload:
                        <input class="out_none form-control" type="file" name="photo" id="photo">
                    </div>
                    <div class="input-container">
                        <h5 style="text-align: left; margin-left:10px;margin-top:10px;">Tempo em horas</h5>
                        <input type="number" id="completionTime" name="completionTime" class="out_none form-control"
                            required></textarea>
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
                <div class="row">

                    <p>
                        <?php
                        foreach ($_SESSION['projects'] as $project) {

                            $projectID = $project['id'];

                            echo
                                '<div class="col-md-4 col-sm-12">
                                    <form class="form"  method="POST">
                                        <div class="input-container">
                                        <h5 style="text-align: left; margin-left:10px;margin-top:10px;">Titulo do projeto</h5>
                                            <input type="text" name="title" id="title" class="out_none" value="' . $project['title'] . '">
                                        </div>
                                        <div class="input-container">
                                        <h5 style="text-align: left; margin-left:10px;margin-top:10px;">Descrição do projeto</h5>
                                            <textarea type="text" id="description" name="description" class="out_none form-control" rows="7" cols="30">' . $project['description'] . '</textarea>
                                            </div>
                                        <input type="text" name="projectID" id="projectID" class="out_none" hidden value="' . $project['id'] . '">
                                        <br>
                                        <h5 style="text-align: left; margin-left:10px;margin-top:10px;">Imagem</h5>   
                                        <img style="height: 200px; width: 317px;margin-bottom:10px; object-fit: fill;" src="data:image/jpeg;base64,' . $project['photo'] . '">
                                        <br>
                                        <h5 style="text-align: left; margin-left:10px;margin-top:10px;">Tempo demorado</h5>
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
                var_dump($_SESSION['photo']);
            }

            ?>



            <?php
            require('sidebar.php');
}
?>
</body>

</html>