<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Umf Caborca</title>
      <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/bootstrap.min.css">

      <script  src="<?php echo constant('URL'); ?>public/js/jquery.min.js"></script>

  <!--<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>-->
  <link rel="shortcut icon" type="image/jpg" href="<?php echo constant('URL'); ?>favicon.ico"/>
  </head>
   
  <body>
  

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">UmfCaborca</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo constant('URL'); ?>pendientes">Pendientes
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo constant('URL'); ?>referencia">Nueva
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo constant('URL'); ?>clonada">Clonar</a>
            </li>
          </ul>
          <form method="post" class="d-flex" action="<?php echo constant('URL'); ?>referencia/muestraPaci" >
            <input class="form-control me-sm-2" type="text" id="search" placeholder="Expediente" name="sears">
            <button class="btn btn-success my-2 my-sm-0" id="trabajar" type="submit">Buscar</button>
          </form>
      </div>
    </div>
</nav>
<script>
  
</script>
