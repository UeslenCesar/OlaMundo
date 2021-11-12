<?php


if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}

?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0f6486;">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLADM?>view">Painel de Controle</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"data-target="#navbarsExample07"
    aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="<?php echo URLADM?>view">Honnnme <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
     
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Site</a>
          <div class="dropdown-menu" aria-labelledby="dropdown07">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLADM; ?>sair" tabindex="-1" aria-disabled="true">Sair</a>
        </li>


      </ul>
      <!-- <form class="form-inline my-2 my-md-0">
        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
      </form> -->
    </div>
  </div>
</nav>