<?php 
    require 'php/functions.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
<title>
        <?php echo NOMBRESITIO ?> - Iniciar sesión
</title>
    <?php require 'includes/head.php'?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 centrar-div">
                <div class="text-center">
                    <h1 class="display-1 text-white"><span><b>G</b></span>ótic<span><b>o</b></span>takus</h1>
                </div>
                <!-- Aquí muestra algún aviso. -->
                <?php
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset( $_SESSION['error']);
                    }elseif(isset($_SESSION['success'])){
                        echo $_SESSION['success'];
                        unset( $_SESSION['success']);
                    }elseif(isset($_SESSION['error_aliasDupli'])){
                        echo $_SESSION['error_aliasDupli'];
                        unset( $_SESSION['error_aliasDupli']);
                    }
                ?>
                <div class="px-4 py-3">
                    <div class="form-group">
                        <input type="text" class="form-control text-center" id="inicio-usuario" placeholder="Ingresa tu alias">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control text-center" id="inicio-contrasena" placeholder="Ingresa tu mantra">
                    </div>
                    <div class="form-group text-right">
                    <button type="submit" class="btn btn-dark px-5">Ingresar</button>
                    <br>
                    <small class="text-white"> <a href="registro.php">¿Sin cuenta? Regístrate</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'includes/footer.php'?>

</body>

</html>