<?php
session_start();
require_once '_config.php';

// Registrar usuario
if (isset($_POST['registrar'])) {
    // El mysqli_real_escape_string sirve para quitar caracteres basura. El htmlentities para quitar funciones tipo HTML
    $alias =  htmlentities(mysqli_real_escape_string($db_link, ($_POST['alias'])));
    // La función md5 encripta la contraseña,
    $mantra = htmlentities(mysqli_real_escape_string($db_link, ($_POST['mantra'])));
    // Hashea el password para que sea más seguro todo.
    $hash = password_hash($mantra, PASSWORD_BCRYPT);

    // Comprueba si el alias ya está en la bd.
    $comprobarAlias = mysqli_num_rows(mysqli_query($db_link, "SELECT alias FROM usuarios WHERE alias = '$alias'"));

    // Si encontró una valor igual al alias, es que ya se tomó. Si no, procede a intentar guardar el usuario en la bd.
    if ($comprobarAlias >= 1) {
        $_SESSION['error_aliasDupli'] =
        '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Ese alias ya existe.
        </div>';
        header("Location: ../../registro.php");
        exit();
    } else {
        // Aquí guarda literalmente al usuario en la bd. Si funcionó, manda aviso de success, si no, manda error.
        $insertarUsuario = mysqli_query($db_link, "INSERT INTO usuarios (alias, mantra, creado_el) VALUES ('$alias','$hash', NOW())");

        if ($insertarUsuario) {
            $_SESSION['success'] =
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Puedes ingresar ahora; te esperamos en el Infierno.
            </div>';
            header("Location: ../../index.php");
            exit();
        } else {
            $_SESSION['error'] =
            '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Hubo un error a la hora de registrarte. Intenta de nuevo.
            </div>';
            header("Location: ../../index.php");
            exit();
        }
    }
}
?>