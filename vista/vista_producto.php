<div class="container">
  <h1 class="display-4"><?php echo $titulo ?></h1>
  
  <div class="row my-4">
    <div class="col card ">
      <img class="card-img-top" src="<?php echo $producto["img"] ?>" >
      <div class="card-body">
        <h3 class="card-title"></h3>
        <h4><?php echo $producto["precio"] ?>€</h4>
        <p class="card-text"><?php echo $producto["descripcion"] ?></p>
        <p class="card-text text-<?php echo $disponibilidad ?>">
         Stock : <?php echo $producto["stock"] ?>
        <?php echo $comprar ?>
        </p>
        <p id="respuesta"></p>
        <span class="text-warning">★ ★ ★ ★ ☆</span>
      </div>
    </div>
  </div>
</div>