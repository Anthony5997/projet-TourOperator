<?php
require("../partials/sql_connect.php");
include('../partials/header.php');
?>
    <h1>Admin Pannel</h1>
    <h3>Liste des opérateurs</h3>
    <?php 
        echo "<a href='/project-tourOperator/admin/admin-form-add-operator.php'>Ajouter un nouvel opérateur</a><br>";


    $manager = new Manager($bdd);

    $listOperator = $manager->getAllOperators();

    foreach($listOperator as $operatorListed){
        $op= new TourOperator($operatorListed);

        echo "Opérateur : " . $op->getName() ."<br>";
        echo "Grade actuel : " . $op->getGrade()."<br>";
        $premium = $op->getPremium() === false ? 'Non' : 'Oui';
        echo "Premium : " . $premium."<br>";
        

        echo "<a href='/project-tourOperator/admin/admin-form-add-destination.php?id=".$op->getId()."'>Ajouter une destination</a><br>";
        echo "<a href='/project-tourOperator/admin/process/admin-addPremium.php?id=".$op->getId()."'>Passer cet opérateur Premium.</a><br>";
        echo "<br><br><br>";
        //var_dump($op);
    }
    
    ?>

</body>
</html>