<div class="container">
  <h1 class="display-4">Productos destacados</h1>
  <div id="slides" class="carousel slide my-3" data-ride="carousel">
    <div class="carousel-inner">
      <a href="producto.php?id=<?php echo $productos_slide[0]["id"] ?>" class="carousel-item active">
          <img class="img-fluid d-block w-25" src="<?php echo $productos_slide[0]["img"]?>">
          <div class="carousel-caption d-md-block">
            <h5 class="text-dark"><?php echo $productos_slide[0]["nombre"] ?></h5>
            <p class="text-dark"><?php echo $productos_slide[0]["descripcion"] ?></p>
          </div>
      </a>
      <a href="producto.php?id=<?php echo $productos_slide[1]["id"] ?>" class="carousel-item">
          <img class="img-fluid d-block w-25" src="<?php echo $productos_slide[1]["img"]?>">
          <div class="carousel-caption d-md-block">
            <h5 class="text-dark"><?php echo $productos_slide[1]["nombre"] ?></h5>
            <p class="text-dark"><?php echo $productos_slide[1]["descripcion"] ?></p>
          </div>
      </a>
      <a href="producto.php?id=<?php echo $productos_slide[2]["id"] ?>" class="carousel-item">
          <img class="img-fluid d-block w-25" src="<?php echo $productos_slide[2]["img"]?>">
          <div class="carousel-caption d-md-block">
            <h5 class="text-dark"><?php echo $productos_slide[2]["nombre"] ?></h5>
            <p class="text-dark"><?php echo $productos_slide[2]["descripcion"] ?></p>
          </div>
      </a>
    </div>
    <a class="carousel-control-prev text-dark" href="#slides" role="button" data-slide="prev">
       <i class="material-icons text-dark">keyboard_arrow_left</i>
      <span class="sr-only ">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
       <i class="material-icons text-dark">keyboard_arrow_right</i>
      <span class="sr-only ">Posterior</span>
    </a>
  </div>
  <h1 class="display-4">Más productos</h1>
  <?php imprimirCartas($productos_extra); ?>
  </div>
</div>