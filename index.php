<?php 
require_once 'php/_config.php';
require_once 'php/_functions.php';

session_start();
// yaLogeado();

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
                    <img src="css/assets/miku.gif" alt="" >
                </div>
                <div class="text-center">
                    <h1 class="display-1 text-white"><span><b>G</b></span>ótic<span><b>o</b></span>takus</h1>
                </div>
                <!-- Aquí muestra algún aviso del registro. -->
                <?php
                    // Registro
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

                    // No se pudo iniciar sesión por alguna razón.
                    if(isset($_SESSION['login_fail'])){
                        echo $_SESSION['login_fail'];
                        unset( $_SESSION['login_fail']);
                    }
                    // Primero debes iniciar sesión.
                    if(isset($_SESSION['primeroLog'])){
                        echo $_SESSION['primeroLog'];
                        unset( $_SESSION['primeroLog']);
                    }
                ?>
                <!-- /Aquí se muestra algún aviso del login. -->

                <form action="../php/_login.php" method="POST" class="px-4 py-3">
                    <div class="form-group">
                        <input type="text" class="form-control text-center" id="inicio-usuario" placeholder="Ingresa tu alias"
                            name="alias" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control text-center" id="inicio-contrasena" placeholder="Ingresa tu mantra"
                            name="mantra" required>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-dark px-5" name="login">Ingresar</button>
                        <br>
                        <small class="text-white"> <a class="login-link" href="registro.php">¿Sin cuenta? Regístrate</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require_once 'includes/footer.php'?>

</body>

</html>