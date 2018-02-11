    <?php require_once("/home/ubuntu/workspace/TiendaVirtual/vista/plantilla.php");?>
    <!-- Contenido del carrito de la compra-->
    <div class="container">
      <h1 class="display-1"><?php echo $titulo ?></h1>
      <div class="jumbotron">
        <h1 class="display-3">Datos personales</h1>
        <dl class="row mt-3">
          <dt class="col-sm-3">Nick</dt>
          <dd class="col-sm-9 col-lg-7 offset-lg-2"><?php echo $usuario["nick"] ?></dd>
        
          <dt class="col-sm-3">Nombre</dt>
          <dd class="col-sm-9 col-lg-7 offset-lg-2"><?php echo $usuario["nombre"] ?></dd>
        
          <dt class="col-sm-3">Apellidos</dt>
          <dd class="col-sm-9 col-lg-7 offset-lg-2"><?php echo $usuario["apellidos"] ?></dd>
        
          <dt class="col-sm-3 ">Dirección</dt>
          <dd class="col-sm-9 col-lg-7 offset-lg-2"><?php echo $usuario["direccion"] ?></dd>
          
          <dt class="col-sm-3 ">Teléfono</dt>
          <dd class="col-sm-9 col-lg-7 offset-lg-2"><?php echo $usuario["tlf"] ?></dd>
        </dl>
      </div>
      <a class="btn btn-danger mb-3 text-white" href="eliminar_usuario.php?u=<?php echo $usuario["id"] ?>">Eliminar cuenta</a>
    </div>
    <?php require_once("/home/ubuntu/workspace/TiendaVirtual/vista/plantilla_footer.php");?>
