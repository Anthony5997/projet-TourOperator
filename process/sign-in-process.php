<?php
require("../partials/sql_connect.php");
require("../Class/Autoloader.php");
Autoloader::register();
session_start();
if(isset($_POST["create"]) && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['pass']) && !empty($_POST['pass'])){
    $operator = new TourOperator($_POST);
    $manager = new Manager($bdd);
    if($manager->operatorExist($operator) === true){
        $manager->createTourOperator($operator);
       header("Location: ../agency/agency-profil.php?message=Operateur crée.");     
    }else{
        header("Location: ../sign-in.php?message=L'opérateur existe déjà.");     
    }
}else{
    header("Location: ../sign-in.php?message=Veuillez remplir les champs.");     
}

