<?php
  require("../../partials/sql_connect.php");
  require("../../Class/Autoloader.php");
  Autoloader::register();
    $connexionManager = new Manager($bdd);
    $operatorSelected = $connexionManager->getOperatorById(intval($_POST['idOperator']));
    $operatorSelected = new TourOperator($operatorSelected);
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
        
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");
        
        if(in_array($filetype, $allowed)){

            if(file_exists("/project-tourOperator/assets/images/" . $_FILES["photo"]["name"])){
                header("Location: /project-tourOperator/admin/admin.php?message=".$_FILES["photo"]["name"] . " existe déjà.");
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "../../assets/images/" . $_FILES["photo"]["name"]);
                $path = "/project-tourOperator/assets/images/". $_FILES['photo']['name'];
                $operatorSelected->hydrate(["photo_link" => $path]);
                $connexionManager->updateTO($operatorSelected);
                } 
                header("Location: /project-tourOperator/admin/admin.php?message=Votre fichier a été téléchargé avec succès.");
        } else{
            header("Location: /project-tourOperator/admin/admin.php?message=Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."); 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>