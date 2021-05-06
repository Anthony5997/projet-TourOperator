<?php
  require("../partials/sql_connect.php");
  require("../Class/Autoloader.php");
  $location= $_GET['destination'];
  Autoloader::register();
  session_start();
if(isset($_POST['author']) && !empty($_POST['author']) && isset($_POST['message']) && !empty($_POST['message'])){
     $connexionManager = new Manager($bdd);
     $review = new Review(["author"=>$_POST["author"], "message"=>$_POST["message"], "id_tour_operator"=>intval($_POST["id_tour_operator"]),"user_grade"=>$_POST["grade"] == 0 ? null :$_POST['grade']]); 
     $connexionManager->createReview($review);
  header("Location: /project-tourOperator/infos-destination.php?message=Nouvelle avis créé.&destination=".$location);
  }else{
  header("Location: /project-tourOperator/infos-destination.php?message=Erreur, veuillez remplir les champs.&destination=".$location);
  }