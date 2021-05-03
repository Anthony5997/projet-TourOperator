<?php
require("../Class/Autoloader.php");
Autoloader::register();
require("../partials/sql_connect.php");
session_start();
$connexionManager = new Manager($bdd);
if($connexionManager->operatorExist($_POST['name']) === true){
    
    $newTO = $connexionManager->createTourOperator($_POST);
    header("Location: ../index.php?message=Le TO a bien été crée");
    
}else{
    header("Location: ../index.php?message=Le TO existe déjà");
}

