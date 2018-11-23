<?php
require_once '_config.php';
session_start();

if(isset($_GET['megusta'])){
    $id_post = $_GET['id_post'];
    $id_actual = $_SESSION['id'];

    $sql_likes = mysqli_query($db_link, " INSERT INTO likes (alias_id, post_id) VALUES ('$id_actual' , '$id_post' )");

    if($sql_likes){
        header('Location: ../../home.php');
    }else{
        echo 'no'
;    }
}



?>