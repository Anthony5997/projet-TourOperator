<?php
  require("../../partials/sql_connect.php");
  require("../../Class/Autoloader.php");
  Autoloader::register();
  session_start();
if(isset($_POST['location']) && !empty($_POST['location']) && isset($_POST['price']) && !empty($_POST['price'])){
     $connexionManager = new Manager($bdd);
     $destination = new Destination(["location"=>$_POST["location"], "price"=>intval($_POST["price"]), "id_tour_operator"=>intval($_POST["id_tour_operator"])]); 
     $connexionManager->createDestination($destination);
  header("Location: ../agency-profil.php?message=Nouvelle destination créée.");
  }else{
  header("Location: ../agency-profil.php?message=Erreur, veuillez remplir les champs.");

  }
