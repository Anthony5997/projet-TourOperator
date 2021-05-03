<?php
require("partials/sql_connect.php");
include('partials/header.php');
?>
<h1>les meilleurs Voyages</h1>

<?php
$manager = new Manager($bdd);

$listDestination = $manager->getAllDestinations();
foreach($listDestination as $destination){
    $destination = new Destination($destination);
    echo "Destination : ".$destination->getLocation()."<br>";
    echo "Prix : ".$destination->getPrice()."<br>";
    echo "<a href='/project-tourOperator/infos-destination.php?destination=".$destination->getLocation()."'>Voir les opérateur proposant cette destination</a>";
    var_dump($destination);
    
}


?>

<?php
include('partials/footer.php');
?>