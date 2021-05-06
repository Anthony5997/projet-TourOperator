<?php
  require("../../partials/sql_connect.php");
  require("../../Class/Autoloader.php");
  Autoloader::register();
  session_start();
    $connexionManager = new Manager($bdd);
    $operatorSelected = $connexionManager->getOperatorById(intval($_GET['id']));
    $operatorSelected = new TourOperator($operatorSelected);
    $connexionManager->deleteOperator($operatorSelected);
header("Location: ../admin.php?message=Operateur Supprimer!");