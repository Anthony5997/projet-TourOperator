<?php
include('../partials/header.php');
?>

<div class="container-style">
  <div class="container sign-form">
      <h1 class="text-center sign-h1">Ajouter un nouvel opérateur</h1>
      <div class="style-form">          
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