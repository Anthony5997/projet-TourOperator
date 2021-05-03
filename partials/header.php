<?php 
session_start();
  require(__DIR__."/../Class/Autoloader.php");
  Autoloader::register();
  if (isset($_SESSION['auth'])) {
    $operator = new TourOperator($_SESSION['auth']);
  }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Norican&family=Playball&display=swap">
    <link rel="stylesheet" href="/project-tourOperator/assets/css/main.css">
    <title>TO Voyage</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <a class="navbar-brand topnav" href='/project-tourOperator/index.php'><h6> <img style="height: 100px; width:100px;" src="/project-tourOperator/assets/images/tourime-et-voyage.jpg"/>Voyage voyage</h6> </a>
      <div class="row">
      <ul class="navbar-nav">
        <li class="nav-item">
        <?php if (!isset($operator)) {?>
           <div class="d-flex justify-content-end col-sm-4">
             <a class="nav-link active" aria-current="page" href="sign-up.php">Connexion</a>
            </div>
            <?php  }else{ ?>
                    <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                        Agence <?=$operator->getName();?></a>
                       
                        <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                            <li><a class='dropdown-item' href='/project-tourOperator/agency/agency-profil.php'>Mon Agence</a></li>
                            <li><a class='dropdown-item' href="/project-tourOperator/process/deco.php">Déconnexion</a></li>
                         </ul>
                 </li>     
        </div>
       <?php } 
            if(isset($_GET["message"])){ ?>
             <div style="padding: 10px; width:20vw; background:green; color:#fff; margin-right: 10px; text-align: center; border-radius: 20px">
                      <?= $_GET["message"]?>
                    </div>
          <?php  }?>
      </ul>
      </div>
    </div>
  </div>
</nav> 
<body>
<br><br> 