<?php
require_once 'php/_config.php';
require_once 'php/_functions.php';
session_start();
noLogeadoRedirect();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php echo NOMBRESITIO ?> - Cripta</title>
    <?php include 'includes/head.php'?>
</head>

<body>
    <div class="container">
        <div class="row py-4">
            <div class="col-md-12">
                <div class="text-center">
                    <h2 class="display-2 text-white"><span><b>G</b></span>ótic<span><b>o</b></span>takus</h2>
                </div>
            </div>

        </div>
        <div class="row py-4">
            <div class="col-md-4">
                <div class="py-2">
                    <img src="img/<?php echo $_SESSION['avatar_img'] ?>" class="img-fluid" src="" alt="Actualmente no tienes ROSTRO. Se te ve el CRÁNEO.">
                </div>
                <?php
                // Se cargó el avatar.
                unset( $_FILES['avatar']);

                if(isset($_SESSION['avatar_cargado'])){
                    echo $_SESSION['avatar_cargado'];
                    unset( $_SESSION['avatar_cargado']);
                }elseif(isset($_SESSION['avatar_error'])){
                    echo $_SESSION['avatar_error'];
                    unset($_SESSION['avatar_error']);
                }
                ?>
                <p class="text-white lead">Per aspera ad astra, <b>
                        <?php echo $_SESSION['alias'] ?></b>.</p>

                <div class="py-1">
                    <i class="fas fa-skull-crossbones fa-lg text-white"></i>
                    <a class="login-link" href="editarPerfil.php"> Alterar ADN</a><br>
                </div>

                <div class="py-1">
                    <i class="fas fa-skull-crossbones fa-lg text-white"></i>
                    <a class="login-link" href="php/_logout.php"> Cometer suicido</a><br>
                </div>

                <div>
                    <p class="text-white text-center">Tus aliados</p>

                    <ul class="list-group>">
                        <?php
    $id_actual = $_SESSION['id'];
    $amigos = mysqli_query($db_link, " SELECT * FROM amigos WHERE id_alias = '$id_actual' ");
    
    
    foreach($amigos as $amigo){

        // $nombreAmigo = mysqli_query($db_link, "SELECT * FROM usuarios WHERE id = '$amigo['id']' ");

        echo '
                <li class="list-group-item text-black">' .$amigo['id_amigo']. '</li>
            ';
    }
    ?>
                    </ul>


                </div>


            </div>
            <div class="col-md-4">
                <form class="form-group" action="php/_publicar.php" method="post">
                    <textarea class="form-control" name="epitafio" id="epitafio-area" cols="30" rows="4" placeholder="Escribe tus últimas palabras."
                        required></textarea>
                    <button class="epitafio-boton form-control btn btn-dark" type="submit" name="publicar">C A L L A R</button>
                </form>

                <?php
                $epitafios = mysqli_query($db_link, "SELECT * FROM epitafios ORDER BY id DESC");
                $quienes = mysqli_query($db_link, "SELECT * FROM usuarios");

                foreach($epitafios as $epitafio ){

                    echo
                        '<div class="card bg-dark text-white p-5 mb-3">
                            <img class="card-img-top" src="img/avatar_'.$epitafio['id_alias'].'.jpg" alt="nudes">
                            <br>
                            <h4>ha dicho...</h4>
                            <br>
                            <p class="fuente-gotica">'.$epitafio['epitafio'].'</p>
                        </div>';
                }
                ?>
            </div>
            <div class="col-md-4">
                <p class="text-white text-center">Todos</p>

                <ul class="list-group>">
                    <?php
                    $aliases = mysqli_query($db_link, " SELECT * FROM usuarios ");
                    foreach($aliases as $alias){
                        echo '
                                <li class="list-group-item text-black">' .$alias['alias']. ' -> ID: '.$alias['id'].'</li>

                                <form action="php/_agregarAmigo.php" type="get">
                                <input type="hidden" name="aid" value="'.$alias['id'].'">
                                <button class="form-control btn btn-danger epitafio-boton mb-3" type="submit" name="agregar_amigo" >Agregar aliado</button>
                                </form>

                            ';
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>

    <?php require 'includes/footer.php'?>

</body>

</html>