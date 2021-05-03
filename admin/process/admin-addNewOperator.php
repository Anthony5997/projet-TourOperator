<?php
  require("../../partials/sql_connect.php");
  require("../../Class/Autoloader.php");
  Autoloader::register();
  session_start();
if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['pass']) && !empty($_POST['pass'])){
    $operator = new TourOperator($_POST);
    $manager = new Manager($bdd);
    if($manager->operatorExist($operator) === true){
        $manager->createTourOperator($operator);
       header("Location: /project-tourOperator/admin/admin.php?message=Operateur crée.");     
    }else{
        header("Location: /project-tourOperator/admin/admin-form-add-operator.php?message=L'opérateur existe déjà.");     
    }
}else{
    header("Location: /project-tourOperator/admin/admin-form-add-operator.php?message=Veuillez remplir les champs.");     
}