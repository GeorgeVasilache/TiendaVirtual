    <?php require_once("/home/ubuntu/workspace/TiendaVirtual/vista/plantilla.php");?>
    
      <div class="container">
        <div class="jumbotron jumbotron-fluid mt-3">
          <div class="container">
            <h1 class="display-1">Panel del administrador</h1>
            <p class="lead">Desde aquí se puede añadir nuevos productos, borrarlos, y ver un listado de los pedidos.</p>
          </div>
        </div>
      </div>
      
      <div class="container">
        <button class="btn btn-primary mb-3" type="button" data-toggle="collapse" data-target="#introducirProducto" aria-expanded="false" aria-controls="introducirProducto">
        Introducir nuevo producto
        </button>
        <?php echo $msj_producto_nuevo?>
      </div>
      
      <div class="collapse" id="introducirProducto">
        <div class="container">
          <form action="nuevo_producto.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduzca el nombre del producto" required title="nombre necesario">
        </div>
        <div class="form-group">
          <label for="descripcion">Descripción</label>
          <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Introduzca la descripción del producto" required="required">
        </div>
        <div class="form-group">
          <label for="categoria">Categoría</label>
          <select class="form-control" id="categoria" name="categoria"required="required">
            <option name="categoria" value="j">Juegos de Mesa</option>
            <option name="categoria" value="m">MTG</option>
            <option name="categoria" value="l">Libros de Rol</option>
          </select>
        </div>
        <div class="form-group">
          <label for="precio">Precio</label>
          <input type="text" class="form-control" id="precio" name="precio" placeholder="Introduzca el precio del producto" required title="Solamente números enteros o decimaes con '.'" pattern="^\d+(\.\d{1,2})?$">
        </div>
        <div class="form-group">
          <label for="stock">Stock</label>
          <input type="number" class="form-control" id="stock" name="stock" placeholder="Introduzca el stock deseado" required title="Mínimo 1 producto" min="1">
        </div>
        <div class="form-group">
          <label for="img">Imagen</label>
          <input type="file" class="form-control" id="img" name="img" accept="image/x-png,image/jpeg" placeholder="Introduzca una imagen del producto" required title="imagen necesario">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Añadir producto</button>
        </form>
        </div>
      </div>
      <div class="container">
        <h1 class="display-3">Lista de Productos</h1>
        <?php mostrarProductos() ?>
      </div>
    <?php require_once("/home/ubuntu/workspace/TiendaVirtual/vista/plantilla_footer.php");?>
