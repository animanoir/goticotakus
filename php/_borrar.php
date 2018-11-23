<?php
require_once '_config.php';
session_start();

if (isset($_GET['eliminar'])) {

    // $epitafio =  mysqli_real_escape_string($db_link, $_POST['epitafio']);
    $id = $_GET['pid'];

    //
    $sql_borrar_pub = mysqli_query($db_link, "DELETE FROM epitafios WHERE id = '$id'");

    if ($sql_borrar_pub) {
        $_SESSION['epitafio_borrado'] =
            '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Ojalá en la vida real pudieras borras tus actos también.
        </div>';
        header("Location: ../../editarPerfil.php");
        // exit();
    } elseif (isset($_POST['editar'])) {
        Header('Location: ../../editarPost.php');
    }

    //No sé por qué pero ésto solucionó el warning.
    ob_end_flush();

}
