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

    <title>Caso Prático Criação de Website com carregamento dinâmico de conteúdo estático através de AJAX</title>


</head>



<body style="background-color: #c4c4c4;">

    <script>
        $(document).ready(function () {
            <?php
             $getProjects();
             $getNewsIndex();
             ?>
        });
    </script>

    <nav>
        <ul style="background-color: #c4c4c4;">
            <li><a href="#first_sec">Notícias</a></li>
            <li><a href="#second_sec">Portfolio</a></li>
            <li><a href="#third_sec">Galeria de Imagens</a></li>
            <li><a href="#fourth_sec">Orçamento</a></li>
        </ul>
    </nav>



    <section id="first_sec" style="background-color: #c4c4c4;">Notícias</section>
    <div class="news" id="news_feed">Conteudo AJAX com as notícias</div>
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
                                        <input type="button" name="title" class="out_none news-title" value="' . $new['title'] . '">
                                    </div>
                                        <div class="input-container description-container" hidden>
                                        <h5 style="text-align: left; margin-left:10px;margin-top:10px;">Descrição da notícia</h5>
                                            <textarea type="text" id="description" name="description" disabled class="out_none form-control" rows="7" cols="30">' . $new['description'] . '</textarea>
                                        </div>
                                        
                                        <input type="text" name="newID" id="newID" class="out_none" hidden value="' . $new['id'] . '">
                                    </form>
                                </div>
                                
                                ';

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
    <section id="second_sec" style="background-color: #c4c4c4;">Portfolio</section>
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
                                            <input type="text" name="title" id="title" class="out_none" disabled value="' . $project['title'] . '">
                                        </div>
                                        <div class="input-container">
                                        <h5 style="text-align: left; margin-left:10px;margin-top:10px;">Descrição do projeto</h5>
                                            <textarea type="text" id="description" name="description" disabled class="out_none form-control" rows="7" cols="30">' . $project['description'] . '</textarea>
                                            </div>
                                        <input type="text" name="projectID" id="projectID" class="out_none" hidden value="' . $project['id'] . '">
                                        <br>
                                        <h5 style="text-align: left; margin-left:10px;margin-top:10px;">Imagem</h5>   
                                        <img style="height: 200px; width: 317px;margin-bottom:10px; object-fit: fill;" src="data:image/jpeg;base64,' . $project['photo'] . '">
                                        <br>
                                        <h5 style="text-align: left; margin-left:10px;margin-top:10px;">Tempo demorado</h5>
                                        <input class="out_none form-control" type="number" name="completionTime" id="completionTime" disabled class="out_none" value="' . $project['completion_time'] . '">
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




    <section id="third_sec" style="background-color: #c4c4c4;">Galeria de Imagens</section>
    <div class="main">Conteudo com galeria em fancybox<div>
            <a class="textdeco_none" href="../images/image1.jpg" data-fancybox
                data-caption="McWay Falls - USA (Califórnia)">
                <img src="./images/image1.jpg" />
            </a>
        </div>
        <hr>
        <div>
            <a class="textdeco_none" href="./images/image2.jpg" data-fancybox="image_group"
                data-caption="Fontana di Trevi - Itália">
                <img src="./images/image2.jpg" />
            </a>
            <a class="textdeco_none" href="./images/image3.jpg" data-fancybox="image_group"
                data-caption="Paris - França">
                <img src="./images/image3.jpg" />
            </a>
            <a class="textdeco_none" href="./images/image4.jpg" data-fancybox="image_group"
                data-caption="Basílica de São Pedro - Portugal">
                <img src="./images/image4.jpg" />
            </a>
            <a class="textdeco_none" href="./images/image5.jpg" data-fancybox="image_group"
                data-caption="Gruta de Benagil - Portugal">
                <img src="./images/image5.jpg" />
            </a>
            <a class="textdeco_none" href="./images/image6.jpg" data-fancybox="image_group"
                data-caption="Ribeira do Porto - Portugal">
                <img src="./images/image6.jpg" />
            </a>

        </div>
    </div>


    <section id="fourth_sec" style="background-color: #c4c4c4;">Pedido de Orçamento</section>
    <div class="">
        <div class="div_third_sec">
            <h2>Dados</h2>
            <p>Nome: <input type="text" name="" id=""></p>
            <p>Apelido: <input type="text" name="" id=""></p>
            <p>Telemóvel: <input type="number" name="" id=""></p>
            <h2>Pedido de Orçamento</h2>
            <label for="page">Tipo de Página:</label>
            <select name="page_type" id="page_select">
                <option value="none">Selecione uma opção</option>
                <option value="social">Social</option>
                <option value="data">Base de dados</option>
                <option value="game">Jogo</option>
                <option value="blog">Blog</option>
            </select>
            <p>Prazo em meses: <input onclick="check_checkbox()" type="number" id="date_limit"></input></p>
            <br>
            <p style="color: white;">Marque os separadores desejados</p>
            <div style="display: inline-block;">
                <input onclick="check_checkbox()" class="cb_wishlist" type="checkbox" name="who_we_are" id="who_we_are"
                    value="who_we_are"> <label for="who_we_are">Quem somos</label><br>
                <input onclick="check_checkbox()" class="cb_wishlist" type="checkbox" name="where_we_are"
                    id="where_we_are" value="where_we_are"> <label for="where_we_are">Onde estamos</label><br>
                <input onclick="check_checkbox()" class="cb_wishlist" type="checkbox" name="photo_gallery"
                    id="photo_gallery" value="photo_gallery"> <label for="photo_gallery">Galeria de
                    fotografias</label><br>
                <input onclick="check_checkbox()" class="cb_wishlist" type="checkbox" name="eCommerce" id="eCommerce"
                    value="eCommerce"> <label for="eCommerce">eCommerce</label><br>
                <input onclick="check_checkbox()" class="cb_wishlist" type="checkbox" name="internal_management"
                    id="internal_management" value="internal_management"> <label for="internal_management">Gestão
                    interna</label><br>
                <input onclick="check_checkbox()" class="cb_wishlist" type="checkbox" name="news" id="news"
                    value="news"> <label for="news">Notícias</label><br>
                <input onclick="check_checkbox()" class="cb_wishlist" type="checkbox" name="social_network"
                    id="social_network" value="social_network"> <label for="social_network">Redes sociais</label>
            </div>
            <br>
            <h3>Orçamento estimado</h3>
            <p>(É um valor indicativo)</p>
            <input type="text" name="" id="final_price" disabled style="color: white;">
            <input type="text" name="" id="final_discount" disabled style="color: white;">
        </div>

    </div>



    <script>
        Fancybox.bind("[data-fancybox]", {
        });
    </script>

    <?php
    require('sidebar.php');

    ?>
</body>

</html>