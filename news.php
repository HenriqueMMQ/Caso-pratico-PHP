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
                <?php $getNews(); ?>
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
                    <h2 style="text-align: center;">Título da notícia</h2>
                    <div class="input-container">
                        <input type="text" name="title" id="title" class="out_none form-control" required>
                    </div>
                    <div class="input-container">
                        <h5 style="text-align: left; margin-left:10px;margin-top:10px;">Corpo da notícia:</h5>
                        <textarea type="text" id="description" name="description" class="out_none form-control" rows="7"
                            cols="30" required></textarea>
                    </div>
                    <div>
                        <input name="action" value="add_new" hidden>
                    </div>
                    <button type="submit" class="submit">
                        Publicar notícia
                    </button>
                </form>
            </div>
        </div>


        </div>
        <div class="col form-dark">
            <?php
            if ($_SESSION['news']) {
                ?>

                <h2>Notícias:</h2>
                <div class="row">

                    <p>
                        <?php
                        foreach ($_SESSION['news'] as $new) {

                            $newID = $new['id'];

                            echo
                                '<div class="col-md-4 col-sm-12">
                                    <form class="form"  method="POST">
                                        <div class="input-container">
                                        <h5 style="text-align: left; margin-left:10px;margin-top:10px;">Titulo da notícia</h5>
                                            <input type="text" name="title" id="title" class="out_none" value="' . $new['title'] . '">
                                        </div>
                                        <div class="input-container">
                                        <h5 style="text-align: left; margin-left:10px;margin-top:10px;">Descrição da notícia</h5>
                                            <textarea type="text" id="description" name="description" class="out_none form-control" rows="7" cols="30">' . $new['description'] . '</textarea>
                                            </div>
                                        <input type="text" name="newID" id="newID" class="out_none" hidden value="' . $new['id'] . '">
                                        <button name="action" value="edit_new" type="submit" class="submit">
                                        Editar notícia
                                    </button>
                                    <button name="action" value="delete_new" type="submit" class="submit">
                                        Apagar notícia
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
                <h2>Não há notícias</h2>

                <?php
            }

            ?>



            <?php
            require('sidebar.php');
}
?>
</body>

</html>