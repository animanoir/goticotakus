<?php

session_start();
require 'config.php';

// Registrar usuario
if (isset($_POST['login'])) {
    $alias = mysqli_real_escape_string($db_link, md5($_POST['alias']));
    $mantra = mysqli_real_escape_string($db_link, md5($_POST['mantra']));

    // Comprueba si el alias ya está en la bd.
    $comprobarAlias = mysqli_num_rows(mysqli_query($db_link, "SELECT alias FROM usuarios WHERE alias = '$alias'"));
    if ($comprobarAlias >= 1) {
        echo 'Ya existe ese alias.';
    } else {
        $insertarUsuario = mysqli_query($db_link, "INSERT INTO usuarios (id, alias, mantra, creado_en) VALUES ('$alias','$mantra', NOW()");
        if ($insertarUsuario) {
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Felicidades se ha registrado correctamente.
            </div>';
            header('Location: ../registro.php');
            die();
        } else {
            echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Hubo un error al registrar el usuario.
            </div>';
            header('Location: ../registro.php');
            die();
        }
    }
}
?>