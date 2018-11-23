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
                    <img src="img/<?php echo $_SESSION['avatar_img'] ?>" class="img-fluid" src="" alt="Tu calavera es atractiva.">
                </div>
                <?php
// Se cargó el avatar.
if (isset($_SESSION['avatar_cargado'])) {
    echo $_SESSION['avatar_cargado'];
    unset($_SESSION['avatar_cargado']);
}
?>
                <p class="text-white lead">Edita tu ADN, <b>
                        <?php echo $_SESSION['alias'] ?></b>.</p>

                <div class="py-1">
                    <i class="fas fa-skull-crossbones fa-lg text-white"></i>
                    <a class="login-link" href="home.php"> Regresar a casa</a><br>
                </div>

                <div class="py-1">
                    <i class="fas fa-skull-crossbones fa-lg text-white"></i>
                    <a class="login-link" href="php/_logout.php"> Cometer suicido</a><br>
                </div>
            </div>

            <div class="col-md-6">
                <form class="form-group" action="php/_subirImagen.php" method="post" enctype="multipart/form-data">
                    <p class="text-white fuente-muli">
                        Selecciona un nuevo rostro <b>sólo .jpg</b>:
                    </p>
                    <input class="form-control" type="file" name="avatar" required>
                    <div class="text-right py-2">
                        <button type="submit" class="btn btn-dark px-5" name="subir">Quiero dejar de ser feo</button>
                    </div>
                </form>
                <hr>

                <?php
                if(isset($_SESSION['epitafio_borrado'])){
                    echo $_SESSION['epitafio_borrado'];
                    unset( $_SESSION['epitafio_borrado']);
                }
?>

                <?php
$id_actual = $_SESSION['id'];
$sql_posts_id = mysqli_query($db_link, " SELECT * FROM epitafios WHERE id_alias = '$id_actual'");

foreach ($sql_posts_id as $epitafio) {

    echo
        '
                            <form  class="mb-4" type="get" action="php/_borrar.php">
                                <div class="card bg-dark text-white p-5">
                                    <br>
                                    <h4>has dicho...</h4>
                                    <br>
                                    <p class="fuente-gotica">' . $epitafio['epitafio'] . '</p>
                                </div>
                                <input type="hidden" name="pid" value="'.$epitafio['id'].'">
                                <button id="epitafio-boton" class="form-control btn btn-danger" type="submit" name="eliminar" >B O R R A R</button>
                            </form>
        ';
}

?>
            </div>
        </div>
    </div>



    <?php require 'includes/footer.php'?>
</body>

</html>