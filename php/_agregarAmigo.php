<?php
require_once '_config.php';
session_start();

if(isset($_GET['agregar_amigo'])){
    $id_actual = $_SESSION['id'];
    $id_amigo_agregar = $_GET['aid'];

    $sql_agregar = mysqli_query($db_link, "INSERT INTO amigos (id_alias, id_amigo) VALUES ('$id_actual', '$id_amigo_agregar')" );

    if ($sql_agregar) {
        // $_SESSION[''] =
        //     '<div class="alert alert-success alert-dismissible">
        // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        // Ojalá en la vida real pudieras borras tus actos también.
        // </div>';
        header("Location: ../../home.php");
        exit();
    }
}

ob_end_flush();



?>