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
<section class="indexContent">
    <h1 class="text-center">Nos agences Partenaires</h1>
    <div class="container">
        <div class="row d-flex justify-content-around">
        <form class="d-flex">
            <input class="form-control m-2" name="search-agency" type="search" placeholder="Search" aria-label="Search" id="search-agency">
        </form>
        <div  class="row justify-content-center agency-list">
      <?php
          $manager = new Manager($bdd);
          $listOperator = $manager->getAllOperators();
          foreach($listOperator as $operator){
              $operator = new TourOperator($operator); ?>
            <div class="card-info-destination col-xl-3 col-md-5 col-sm-12 p-2 m-3">
                <img class="card-img-top" src="<?=$operator->getPhoto_link();?>">
                <div class="card-info">
                  <h5><?=$operator->getName()."<br>"?></h5>
                  <div class="card-sub-info">
                    <p><?=$operator->getGrade()== null ? "Note global : Pas de note pour l'instant" : "Note global : " .  $operator->getGrade() . " / 5 <br>";?></p>
                  </div>
                </div>
                  <?php $allReviews = $manager->getReviewByOperator($operator);
                        $manager->getAverageGradeByOperator($operator);?>
              <div class="container">
                <div class="user-avis">
                  <h5>Avis de nos utilisateur</h5>
                  <div class="modify-state d-flex justify-content-center" id="<?=$operator->getId();?>">
                          <a class="text-center">Voir les avis</a>
                  </div>
                  <div class="comment-zone" id="modify-state<?=$operator->getId();?>">
                  <div class='list-review<?=$operator->getId();?>'>
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
                <?php include('review-form.php'); ?>
            </div>
          <?php }  ?>
        </div>
    </div>
</section>

<?php
    include("partials/footer-display.php");
    include('partials/footer.php');
?>