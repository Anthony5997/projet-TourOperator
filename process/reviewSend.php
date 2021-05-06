<?php
  require("../partials/sql_connect.php");
  require("../Class/Autoloader.php");
  Autoloader::register();
$manager = new Manager($bdd);
$operatorSelected = $manager->getOperatorById(intval($_POST['id_tour_operator']));
$operator = new TourOperator($operatorSelected);
$allReviews = $manager->getReviewByOperator($operator);


                        
foreach($allReviews as $review){
    $review = new Review($review);?>
    <div class="card-review">
        <h4><?=" Auteur : " . $review->getAuthor();?></h4>
        <p><?= "Message : <br>" .  "" .$review->getMessage();?></p>
        <p class="note"><?= "Note du client : " .   $review->getUserGrade()?></p>
    </div>
<?php }?>