<?php
require_once 'php/_config.php';
require_once 'php/_functions.php';
session_start();
noLogeadoRedirect();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php echo NOMBRESITIO ?> - Cripta</title>
    <?php include 'includes/head.php'?>
</head>

<body>
    <div class="container">
        <div class="row py-4">
            <div class="col-md-12">
                <div class="text-center">
                    <h2 class="display-2 text-white"><span><b>G</b></span>ótic<span><b>o</b></span>takus</h2>
                </div>
            </div>

        </div>
        <div class="row py-4">
            <div class="col-md-4">
                <div class="py-2">
                    <img src="img/<?php echo $_SESSION['avatar_img'] ?>" class="img-fluid" src="" alt="Foto de perfil">
                </div>
                <?php
                // Se cargó el avatar.
                if(isset($_SESSION['avatar_cargado'])){
                    echo $_SESSION['avatar_cargado'];
                    unset( $_SESSION['avatar_cargado']);
                }
                ?>
                <p class="text-white lead">Per aspera ad astra, <b>
                        <?php echo $_SESSION['alias'] ?></b>.</p>

                <div class="py-1">
                    <i class="fas fa-skull-crossbones fa-lg text-white"></i>
                    <a href="editarPerfil.php"> Hacerse cirugía plástica</a><br>
                </div>

                <div class="py-1">
                    <i class="fas fa-skull-crossbones fa-lg text-white"></i>
                    <a href="php/_logout.php"> Cometer suicido</a><br>
                </div>
            </div>
            <div class="col-md-4">
                <form class="form-group" action="" method="post">
                    <textarea class="form-control" name="epitafio" id="epitafio-area" cols="30" rows="4" placeholder="Escribe tus últimas palabras."></textarea>
                    <button id="epitafio-boton" class="form-control btn btn-dark" type="submit">C A L L A R</button>
                </form>
            </div>
            <div class="col-md-4">
                <p class="text-white text-center">Tus enemigos</p>
            </div>
        </div>

    </div>






    <?php require 'includes/footer.php'?>

</body>

</html>