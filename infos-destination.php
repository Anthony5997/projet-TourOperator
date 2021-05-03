<?php
require("partials/sql_connect.php");
include('partials/header.php');
$location = $_GET['destination'];
$manager = new Manager($bdd);
$listDestination = $manager->getOperatorByDestination($location);
$manager->getSimilarDestination($location);

foreach($listDestination as $operatorOnList){
    var_dump($operatorOnList);
    
    echo "Agence : " . $operatorOnList->getName()."<br>";
    echo "<a href=''>Afficher les détails</a>";
    
    // echo "Prix : " . $destination->getPrice()."<br>";
}
$destinationListed = $manager->getDestinationByOperator($operatorOnList);
foreach($destinationListed as $dest){
    var_dump($dest);
    echo "Price : " . $dest->getPrice()."<br>";
}    
?>
