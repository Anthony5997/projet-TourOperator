<?php 
  require("../partials/sql_connect.php");
  require("../Class/Autoloader.php");
  Autoloader::register();
  session_start();
  if(isset($_POST["connexion"]) && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['pass']) && !empty($_POST['pass'])){
      
    $operator = new TourOperator($_POST);
    $manager = new Manager($bdd);
    $manager->getOperator($operator);
    $_SESSION = ['auth' => [
        'id'=> $operator->getId(),
        'grade'=> $operator->getGrade(),
        'name'=> $operator->getName(),
        'is_premium'=> $operator->getPremium(),
        'link'=>$operator->getLink()
    ]];
     header("Location: ../agency/agency-profil.php?message=Connexion réussis.");
}else{
    
    header("Location: ../sign-in.php?message=Veuillez remplir les champs.");     
}

