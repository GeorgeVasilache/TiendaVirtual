    <?php require_once("/home/ubuntu/workspace/TiendaVirtual/vista/plantilla.php");?>
    <!-- Contenido del carrito de la compra-->
    <div class="container">
      <h1 class="display-1 my-4"><?php echo $titulo ?></h1>
        <?php mostrarCarrito() ?>
      <p id="respuesta"></p>
    </div>
    <?php require_once("/home/ubuntu/workspace/TiendaVirtual/vista/plantilla_footer.php");?>
