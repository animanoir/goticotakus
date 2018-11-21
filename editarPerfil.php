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
        <?php echo NOMBRESITIO ?> - Editar ADN</title>
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

        <div class="fuente-muli row py-4">
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
                <p class="text-white lead">Edita tu ADN, <b>
                        <?php echo $_SESSION['alias'] ?></b>.</p>

                <div class="py-1">
                    <i class="fas fa-skull-crossbones fa-lg text-white"></i>
                    <a href="home.php"> Regresar a casa</a><br>
                </div>

                <div class="py-1">
                    <i class="fas fa-skull-crossbones fa-lg text-white"></i>
                    <a href="php/_logout.php"> Cometer suicido</a><br>
                </div>
            </div>

            <div class="col-md-6">
                <form class="form-group" action="php/_subirImagen.php" method="post" enctype="multipart/form-data">
                    <p class="text-white fuente-muli">
                        Selecciona un nuevo rostro <b>sólo .jpg</b>:
                    </p>
                    <input class="form-control" type="file" name="avatar">
                    <div class="text-right py-2">
                    <button type="submit" class="btn btn-dark px-5" name="subir">Quiero dejar de ser feo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <?php require 'includes/footer.php'?>
</body>

</html>