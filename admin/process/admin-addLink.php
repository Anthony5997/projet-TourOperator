<?php
  require("../../partials/sql_connect.php");
  require("../../Class/Autoloader.php");
  Autoloader::register();
    $connexionManager = new Manager($bdd);
    $operatorSelected = $connexionManager->getOperatorById(intval($_POST['linkIdOperator']));
    $operatorSelected = new TourOperator($operatorSelected);

    if($operatorSelected->getPremium()===true){
            $operatorSelected->hydrate(["link" => $_POST['link']]);
            $connexionManager->updateTO($operatorSelected);
        header("Location: ../admin.php?message=Lien du site ajouter!");
    }else{
        header("Location: ../admin.php?message=Impossible, ce membre n'est pas premium");
    }

