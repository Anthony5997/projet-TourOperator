<?php
require("partials/sql_connect.php");
include('partials/header.php');
?>
<section>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/project-tourOperator/assets/images/headerPlage.jpg" class="d-block" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/project-tourOperator/assets/images/headerPlage2.jpg" class="d-block" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/project-tourOperator/assets/images/piscine.jpg" class="d-block" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>
    <div class="container">
        <div class="row">
            <div class="d-flex">
                <div class="col-sm-4">
                    <a class="nav-link text-center" href="/project-tourOperator/index.php">Home</a>
                </div>
                <div class="col-sm-4 d-flex">
                    <a class="nav-link text-center" href="/project-tourOperator/destination.php">Destinations</a>
                </div>
                <div class="col-sm-4">
                    <a class="nav-link text-center " href="/project-tourOperator/agence.php">Agences</a>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row justify-content-center">
        <h1 class="text-center">Toute nos destinations</h1>
        <form class="d-flex">
            <input class="form-control m-2" name="search-destination" type="search" placeholder="Search" aria-label="Search" id="search-destination">
        </form>
        <div  class="row justify-content-center destination-list">
 
            <?php
                $manager = new Manager($bdd);
                $listDestination = $manager->getAllDestinations();
    
                foreach($listDestination as $destination){
                    $destination = new Destination($destination); ?>
                    <div class="d-flex justify-content-center card col-xl-3 col-md-5 col-sm-12 p-2 m-3 ">
                        <img class="card-img-top" src="<?= $destination->getPhoto_link_destination();?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= "Destination : ".$destination->getLocation()."<br>";?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?= "<a href='/project-tourOperator/infos-destination.php?destination=".$destination->getLocation()."'>Voir les op??rateur proposant cette destination</a><br>"?></li>
                        </ul>
                    </div>
                <?php }?>
        </div>
        </div>
    </div>
</section>

<?php
    include("partials/footer-display.php");
    include('partials/footer.php');
?>