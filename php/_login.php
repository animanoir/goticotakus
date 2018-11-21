<?php
session_start();
require_once '_config.php';

// Registrar usuario. Checa si el login está isseteado.
if (isset($_POST['login'])) {
        // Toma los datos del formulario
        $alias = htmlentities(mysqli_real_escape_string($db_link, ($_POST['alias'])));
        $mantra = htmlentities(mysqli_real_escape_string($db_link, ($_POST['mantra'])));

        // Busca este usuario en la bd.
        $query_usuario = mysqli_query($db_link, "SELECT id, alias, mantra FROM usuarios WHERE alias = '$alias'");
        // Guarda dentro de una variable la fila del usuario.
        $row = mysqli_fetch_array($query_usuario, MYSQLI_ASSOC);
        $row_hash = $row['mantra'];

        if(password_verify($mantra, $row_hash)){
            $_SESSION['loggedin'] = true;
            $_SESSION['alias'] = $row['alias'];
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (1 * 60);
            header("Location: ../../home.php");
            exit();
        }else{
            $_SESSION['login_fail'] =
            '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Las credenciales de acceso son erróneas.
            </div>';
            header("Location: ../../index.php");
            exit();
        }
    }
?>