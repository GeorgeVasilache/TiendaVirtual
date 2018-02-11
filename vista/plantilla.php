<!DOCTYPE html>
<html lang="es">

  <head>

    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-language" content="es" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Página del "<?php echo $titulo ?>>
    <meta name="author" content="George Vasilache">

    <title><?php echo $titulo ?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="/TiendaVirtual/vista/css/modern-business.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/TiendaVirtual/vista/js/mostrarCategoria.js"></script>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

  </head>

  <body>
    <header>
      <!-- Navegación -->
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Tienda virtual de George</a>
          <?php echo $msjRegistro ?>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-5" href="#" id="productos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Productos
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="productos">
                  <a class="dropdown-item" href="productos.php?cat=1">Categoría 1</a>
                  <a class="dropdown-item" href="productos.php?cat=2">Categoría 2</a>
                  <a class="dropdown-item" href="productos.php?cat=3">Categoría 3</a>
                </div>
              </li>
          <?php echo imprimirInicioSesion() ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>
