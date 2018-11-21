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
        <div class="row">
            <div class="col-md-12 p-5">
                <p class="h3 text-white">
                    ¿Qué deseas cambiar de tu vida,
                    <?php echo $_SESSION['alias'];?>?
                </p>
                <a href="php/_logout.php">Cerras sesión.</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="form-group" action="php/_subirImagen.php" method="post" enctype="multipart/form-data">
                    Selecciona una imagen para subir:
                    <input class="form-control" type="file" name="avatar">
                    <button type="submit" class="btn btn-dark px-5" name="subir">Subir</button>
                </form>
            </div>
        </div>
    </div>
    <?php require 'includes/footer.php'?>
</body>

</html>