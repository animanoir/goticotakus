<?php

// Esta función checa si el atributo 'loggedin' es falso. Si lo es, manda redirect con una alerta. Si no, no hace nada.
function noLogeadoRedirect()
{
    if (!$_SESSION['loggedin']) {
        $_SESSION['primeroLog'] =
            '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Debes iniciar sesión primero.
        </div>';
        header('Location: index.php');
        exit();
    }
}

// function yaLogeado(){
//     if($_SESSION['loggedin']){
//         header('Location: home.php');
//         exit();
//     }
// }


?>
