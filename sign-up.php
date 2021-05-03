<?php
include("partials/header.php");
?>
<div class="container-style">
  <div class="container sign-form">
      <h1 class="text-center sign-h1">Voyage voyage</h1>
      <div class="style-form">          
            <form method="post" action="process/sign-up-process.php">
            <div class="form-group">
                <input type="text" class="form-control sign-input" name="name" id="name" placeholder="Nom d'agence">
            </div>
            <div class="form-group">
                <input type="password" class="form-control sign-input" name="pass" id="pass" placeholder="Mot de passe">
            </div>
            <button type="submit" class="btn btn-primary col-sm-12 sign-input-button" name="connexion">Submit</button>
            </form>
      </div>
    </div>
    <div>
        <p class="container sign-form ">Vous n'avez pas de compte? <a href="sign-in.php">Inscrivez-vous</a</p>
    </div>
</div>
<?php
include("partials/footer.php");
?>