<?php
require("../partials/sql_connect.php");
include('../partials/header.php');
?>
    <h1 class="text-center">Admin Pannel</h1>
    <h3 class="text-center">Liste des opérateurs</h3>
    <div class="hidden-form-operator d-flex justify-content-center">
        <a class='admin-link text-center'>Ajouter un nouvel opérateur</a><br>
    </div>
        <div class="form-operator" id="hidden-form-operator">
            <div class="container-style">
                <div class="container sign-form">         
                    <form method="post" action="/project-tourOperator/admin/process/admin-addNewOperator.php">
                    <div class="form-group">
                        <input type="text" class="form-control sign-input" name="name" id="name" placeholder="Nouvelle Agence">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control sign-input" name="pass" id="pass" placeholder="Pass de l'agence">
                    </div>
                    <button type="submit" class="btn btn-primary col-sm-12 sign-input-button">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    <div class="container">
            <div class="row justify-content-center">
                <?php
                    $manager = new Manager($bdd);
                    $listOperator = $manager->getAllOperators();
                    foreach($listOperator as $operatorListed){
                        $op= new TourOperator($operatorListed);
                        $allReview = $manager->getReviewByOperator($op);
                        ?>
                        <div class="d-flex justify-content-center card col-xl-3 col-md-5 col-sm-12 p-2 m-3 ">
                            <a class="text-right" href='/project-tourOperator/admin/process/admin-deleteOperator.php?id=<?=$op->getId()?>'> ❌</a>
                            <img class="card-img-top" src="<?= $op->getPhoto_link()?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?="Opérateur : " . $op->getName() ."<br>";?></h5>
                                <p class="card-text"><?=$op->getGrade()== null ? "Note global : Pas de note pour l'instant" : "Note global : " .  $op->getGrade() . " / 5 <br>";?></p></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <?php
                            $premium = $op->getPremium() === false ? '❌' : '✅';
                            echo "Premium : " . $premium."<br>";?>
        
                        <div class="modify" id="<?=$op->getId();?>">
                            <button class="admin-button-update">Infos ▼</button>
                        </div>
                            <div class="hiddenFeature" id="modify<?=$op->getId()?>">
                                <div class="hidden-form-destination" id="<?=$op->getId();?>">
                                    <a>Ajouter une destination ▼</a>
                                </div>
                                <div class="form-destination" id="hidden-form-destination<?=$op->getId();?>">
                                    <div class="container-style">
                                        <div class="container sign-form">
                                            <div>          
                                                    <form method="post" action="process/admin-addDestination-process.php">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control sign-input" name="location" id="location" placeholder="Nouvelle Destination">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control sign-input" name="price" id="price" placeholder="Prix">
                                                    </div>
                                                    <input type="hidden" name="id_tour_operator" value="<?=$op->getId();?>">
                                                    <button type="submit" class="btn btn-primary col-sm-12 sign-input-button">Submit</button>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                
                                    <a href='/project-tourOperator/admin/process/admin-addPremium.php?id=<?=$op->getId()?>'><?=$op->getPremium()==true ? "Premium : ⭐": "Premium : ☆";?></a><br>
                                    <div class="modify-picture" id="<?=$op->getId();?>">
                                        <button class="btn btn-info">📷 ➕</button>
                                    </div>
                                    <div class="hiddenPicture" id="modify-picture<?=$op->getId()?>">
                                        <form class="form-control" method="POST" action="/project-tourOperator/admin/process/admin-upload-img.php" enctype="multipart/form-data">
                                            <input type="hidden" name="idOperator" value="<?=$op->getId();?>">
                                            <input class="form-control custom-file-input" id="fileUpload" name="photo" type="file">
                                        <input type="submit">
                                        </form>
                                    </div>
                            </div>
                            </ul>
                        </div>
                <?php }?>
                </div>
            </div>
</body>
<?php include('../partials/footer.php'); ?>
</html>