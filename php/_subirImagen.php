<?php
require_once '_config.php';
session_start();

// $targetDir = '../img/';
// $fileName = basename($_FILES['file']['name']);
// $targetFilePath = $targetDir . $fileName;
// $extension = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if (isset($_POST['subir'])) {

    $type = 'jpg';
    $rfoto = $_FILES['avatar']['tmp_name'];
    $name = 'avatar_' . $_SESSION['id'] . '.' . $type;
    $id_usuario = $_SESSION['id'];

    if (is_uploaded_file($rfoto)) {
        $destino = '../img/' . $name;
        $nombrea = $name;
        copy($rfoto, $destino);

        $sql_avatar = mysqli_query($db_link, "UPDATE usuarios SET avatar = '$nombrea' WHERE id = '$id_usuario'");
        
        if ($sql_avatar) {
            $_SESSION['avatar_cargado'] =
                '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Imposible, pero se cargó exitosamente tu nuevo avatar.
            </div>';
            $_SESSION['avatar_img'] = $nombrea;
            header('Location: ../home.php');
            exit();
        }else{
            echo "ERROR";
        }
    }

}

// // Path de la imagen
// $targetDir = '../img/';
// $fileName = basename($_FILES['file']['name']);
// $targetFilePath = $targetDir . $fileName;

// if(isset($_POST["subir"]) && !empty($_FILES["file"]["name"])){
//     // Permitir sólo cierto tipo de archivos.

//     $rFoto

//     if(in_array($fileType, $allowTypes)){
//         // Subir archivos al servidor.
//         if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
//             // Insert image file name into database
//             $insert = $db_link->query("INSERT INTO usuarios (imagen) VALUES ('$fileName');");
//             if($insert){
//                 $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
//             }else{
//                 $statusMsg = "File upload failed, please try again.";
//             }
//         }else{
//             $statusMsg = "Sorry, there was an error uploading your file.";
//         }
//     }else{
//         $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
//     }
// }else{
//     $statusMsg = 'Please select a file to upload.';
// }

// // Display status message
// echo $statusMsg;
