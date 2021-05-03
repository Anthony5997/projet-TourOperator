<?php
require("../partials/sql_connect.php");
include('../partials/header.php');

?>
<div class="container-style">
  <div class="container sign-form">
      <h1 class="text-center sign-h1">Ajouter une nouvelle destination</h1>
      <div class="style-form">          
            <form method="post" action="process/addDestination-process.php">
            <div class="form-group">
                <input type="text" class="form-control sign-input" name="location" id="location" placeholder="Nouvelle Destination">
            </div>
            <div class="form-group">
                <input type="text" class="form-control sign-input" name="price" id="price" placeholder="Prix">
            </div>
            <input type="hidden" name="id_tour_operator" value="<?= $operator->getId()?>">
            <button type="submit" class="btn btn-primary col-sm-12 sign-input-button">Submit</button>
            </form>
      </div>
    </div>
</div>


<?php
include("../partials/footer.php");
?>