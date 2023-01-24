<?php
# dépendances
require_once "../config.php";

# connexion
try{
    $db = mysqli_connect(DB_HOST,DB_LOGIN,DB_PWD,DB_NAME,DB_PORT);
    mysqli_set_charset($db, DB_CHARSET);
}catch(Exception $e){
    exit(mb_convert_encoding($e->getMessage(),'UTF-8','ISO-8859-1'));
}

# insertion du message si nécessaire
if(isset($_POST['gb_prenom'],$_POST['gb_nom'],$_POST['gb_email'],$_POST['gb_msg'])){
    // traitement des variables (non spécifique, car non testé dans ce TI)
    $prenom = htmlspecialchars(strip_tags(trim($_POST['gb_prenom'])),ENT_QUOTES);
    $nom = htmlspecialchars(strip_tags(trim($_POST['gb_nom'])),ENT_QUOTES);
    $email = htmlspecialchars(strip_tags(trim($_POST['gb_nom'])),ENT_QUOTES);
    $message = htmlspecialchars(strip_tags(trim($_POST['gb_msg'])),ENT_QUOTES);
    // si pas vide (sauf $nom)
    if(!empty($prenom)&&!empty($email)&&!empty($message)){
        $sql = "INSERT INTO `livreor` (`firstname`,`lastname`,`usermail`,`message`) 
                VALUES ('$prenom','$nom','$email','$message');";
        try{
            $insert = mysqli_query($db,$sql);
            $viewmessage = "Votre message est enregistré, merci.";
        }catch(Exception $e){
            exit(mb_convert_encoding($e->getMessage(),'UTF-8','ISO-8859-1'));
        }
    }else{
        $viewmessage = "Une erreur s'est produite lors de l'enregistrement de votre message.";
    }
}

# selection des messages
$sql = "SELECT * FROM `livreor` ORDER BY `datemessage` DESC;";
try{
    $selectMessage = mysqli_query($db,$sql);
    $nbMessage = mysqli_num_rows($selectMessage);
    $formatMessage = mysqli_fetch_all($selectMessage,MYSQLI_ASSOC);
}catch(Exception $e){
    exit(mb_convert_encoding($e->getMessage(),'UTF-8','ISO-8859-1'));
}

# fermeture de la connexion
mysqli_free_result($selectMessage);
mysqli_close($db);

# appel de la vue
include_once "../view/indexView.php";