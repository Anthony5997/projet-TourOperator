<?php
  require("../../partials/sql_connect.php");
  require("../../Class/Autoloader.php");
  Autoloader::register();
  session_start();
    $connexionManager = new Manager($bdd);
    $reviewSelected = $connexionManager->getReviewById(intval($_GET['id']));
    $reviewSelected = new Review($reviewSelected);
    $connexionManager->deleteReview($reviewSelected);
header("Location: ../admin.php?message=Commentaire Supprimer!");