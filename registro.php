<?php 
    require_once 'php/_config.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>
        <?php echo NOMBRESITIO ?> - Registro
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
                <?php
                if(isset($_SESSION['error_aliasDupli'])){
                        echo $_SESSION['error_aliasDupli'];
                        unset( $_SESSION['error_aliasDupli']);
                    }
                ?>
                <form action="php/_registrar.php" method="POST">
                    <div class="px-4 py-3">
                        <div class="form-group">
                            <!-- Alias -->
                            <input type="text" class="form-control text-center" id="inicio-usuario" name="alias" placeholder="Ingresa el alias con el que te llamarán en el Tártaro" maxlength="20" minlength="3" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control text-center" id="inicio-contrasena" name="mantra" placeholder="Ingresa el mantra con el que abrirás estas puertas" maxlength="50" minlength="6" required>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" name="registrar" class="btn btn-dark px-5" value="registrar">Registrar</button>
                            <br>
                            <small class="text-white"> <a class="login-link" href="index.php">¿Con cuenta? Ingresa</a></small>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require 'includes/footer.php'?>

</body>

</html>