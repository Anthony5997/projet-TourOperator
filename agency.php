<?php
require("partials/sql_connect.php");
include('partials/header.php');
?>
<section class="indexHeader"></section>
    <div class="container">
        <div class="row">
            <div class="d-flex">
                <div class="col-sm-3">
                    <a class="nav-link text-center" href="#">Home</a>
                </div>
                <div class="col-sm-3 d-flex">
                    <a class="nav-link text-center" href="#">Destinations</a>
                </div>
                <div class="col-sm-3">
                    <a class="nav-link text-center " href="#">Agences</a>
                </div>
                <div class="col-sm-3">
                    <a class="nav-link text-center" href="#">Disabled</a>
                </div>
            </div>
        </div>
    </div>
<section class="indexContent">
    <h1 class="text-center">les meilleurs Voyages</h1>
    <section class="indexContent">
    <h1 class="text-center">les meilleurs Voyages</h1>
    <div class="container">
        <div class="row">
            <?php
                $manager = new Manager($bdd);
                $listDestination = $manager->getAllDestinations();
                foreach($listDestination as $destination){
                    $destination = new Destination($destination); ?>

                    <div class="d-flex justify-content-center card col-sm-3 p-2 m-3 ">
                        <img class="card-img-top" src="/project-tourOperator/assets/images/tourime-et-voyage.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= "Destination : ".$destination->getLocation()."<br>";?></h5>
                            <p class="card-text"><?= "Prix : ".$destination->getPrice()."<br>";?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?= "<a href='/project-tourOperator/infos-destination.php?destination=".$destination->getLocation()."'>Voir les opérateur proposant cette destination</a><br>"?></li>
                        </ul>
                    </div>
            <?php }?>
        </div>
    </div>
</section>
<?php
include('partials/footer.php');
?>