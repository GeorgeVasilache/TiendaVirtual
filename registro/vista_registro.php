    <?php require_once("/home/ubuntu/workspace/TiendaVirtual/vista/plantilla.php");?>
    <!-- Contenido del carrito de la compra-->
    <div class="container my-3">
      <h1><?php echo $titulo ?></h1>
      <?php echo $msj ?>
      <form action="registro.php" method="get">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Introduzca su email" required title="campo necesario">
        </div>
        <div class="form-group">
          <label for="nick">Nick</label>
          <input type="text" class="form-control" id="nick" name="nick" aria-describedby="nickHelp" placeholder="Introduzca su nick" required="required">
          <small id="nickHelp" class="form-text text-muted">El nick será necesario para iniciar sesión</small>
        </div>
        <div class="form-group">
          <label for="pass">Contraseña</label>
          <input type="password" class="form-control" id="pass" name="pass" placeholder="Introduzca su contraseña" required title="Mínimo 10 carácteres" pattern=".{10,}">
          <small id="passHelp" class="form-text text-muted">Mínimo 10 caracteres</small>
        </div>
        <hr class="my-5"/>
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduzca su nombre" required title="campo necesario">
        </div>
        <div class="form-group">
          <label for="apellidos">Apellidos</label>
          <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Introduzca sus apellidos" required title="campo necesario">
        </div>
        <div class="form-group">
          <label for="dir">Dirección</label>
          <input type="text" class="form-control" id="dir" name="dir" placeholder="Introduzca su dirección" required title="campo necesario">
        </div>
        <div class="form-group">
          <label for="tlf">Número de teléfono</label>
          <input type="tel" class="form-control" id="tlf" name="tlf" placeholder="Introduzca su número de contacto" required title="El teléfono debe contener 9 dígitos" pattern="^\d{9}$" maxlength="9">
          <small id="telHelp" class="form-text text-muted">El número proporcionado debe tener 9 dígitos</small>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
      </form>
    </div>
    <?php require_once("/home/ubuntu/workspace/TiendaVirtual/vista/plantilla_footer.php");?>
