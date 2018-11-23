<?php

require_once('_config.php');
session_start();



if(isset($_POST['publicar'])){

    echo 'se va a guardar';

    $epitafio =  mysqli_real_escape_string($db_link, $_POST['epitafio']);
    $id_actual = $_SESSION['id'];

    //
    $sql_guardar_pub = mysqli_query($db_link, "INSERT INTO epitafios (epitafio, id_alias) VALUES ('$epitafio', '$id_actual') ");

    if($sql_guardar_pub){
        $_SESSION['epitafio_guardado'] =
        '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Tu voz resonará en ecos infinitos.
        </div>';
        header("Location: ../../home.php");
        exit();
    }else{
        $_SESSION['epitafio_noGuardado'] =
        '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Censura.
        </div>';
        header("Location: ../../home.php");
        exit();
    }



}


?>
