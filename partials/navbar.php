<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/project-tourOperator/index.php">Accueil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/project-tourOperator/agence.php">Agence</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/project-tourOperator/destination.php">Destination</a>
        </li>
      </ul>
     <!-- <form class="d-flex">
        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>
<?php 
if(!empty($_GET['message'])){
    echo '<div class="alert alert-danger " role="alert">'
    .$_GET['message']. 
    '</div>';
}
?>