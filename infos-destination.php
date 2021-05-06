<?php
  require("partials/sql_connect.php");
  include('partials/header.php');
  $location = $_GET['destination'];
  $manager = new Manager($bdd);
  $listDestination = $manager->getOperatorByDestination($location);
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
                  <a class="nav-link text-center" href="#">Destinations</a>
              </div>
              <div class="col-sm-4">
                  <a class="nav-link text-center " href="/project-tourOperator/agence.php">Agences</a>
              </div>
          </div>
      </div>
  </div>
<section class="indexContent">
    <h1 class="text-center">Les meilleurs Voyages</h1>
    <h4 class="text-center">Destination : <?=$location;?></h4>
    <div class="container">
        <div class="row d-flex justify-content-around">
            <?php foreach($listDestination as $operatorOnList){ ?>
              <div class="card-info-destination col-xl-3 col-md-5 col-sm-12 p-2 m-3">
                  <img class="card-img-top" src="<?=$operatorOnList['operator']->getPhoto_link();?>">
                  <div class="card-info">
                    <h5><?=$operatorOnList['operator']->getName()."<br>"?></h5>
                    <div class="card-sub-info">
                      <p><?="Tarif : " . $operatorOnList['destination']->getPrice()."<br>";?></p>
                      <p><?=$operatorOnList['operator']->getGrade()== null ? "Note global : Pas de note pour l'instant" : "Note global : " .  $operatorOnList['operator']->getGrade() . " / 5 <br>";?></p>
                    </div>
                  </div>
                    <?php $allReviews = $manager->getReviewByOperator($operatorOnList["operator"]);
                          $manager->getAverageGradeByOperator($operatorOnList['operator']);?>
                <div class="container">
                  <div class="user-avis">
                    <h5>Avis de nos utilisateur</h5>
                    <div class="modify-state d-flex justify-content-center" id="<?=$operatorOnList['operator']->getId();?>">
                            <a class="text-center">Voir les avis</a>
                    </div>
                    <div class="comment-zone" id="modify-state<?=$operatorOnList['operator']->getId();?>">
                     <div class='list-review<?=$operatorOnList['operator']->getId();?>'>
                     <?php foreach($allReviews as $review){
                        $review = new Review($review);?>
                        <div class="card-review">
                          <h4><?=" Auteur : " . $review->getAuthor();?></h4>
                          <p><?= "Message : <br>" .  "" .$review->getMessage();?></p>
                          <p class="note"><?= "Note du client : " .   $review->getUserGrade()?></p>
                        </div>
                        <?php }?>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
             <?php }  ?>
    </div>
</section>
<?php
include('partials/footer.php');
?>