<?php
require_once 'php/_config.php';
session_start();
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
        <div class="row">
            <div class="col-md-12 p-5">
                <p class="h3 text-white">
                    Bienvenido,
                    <?php $_SESSION['alias']; ?>

                </p>
                <a href="php/_logout.php">Cerras sesión.</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-5">
                <form action="">
                    <form-group>
                        <label for="home-epitafio"><span class="text-white h4">Escribe tu epitafio:</span></label>
                        <textarea class="form-control" name="epitafio" id="home-epitafio" cols="30" rows="10"></textarea>
                    </form-group>
                    <button class="btn btn-dark text-white" type="submit" name="">Agregar epitafio</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>