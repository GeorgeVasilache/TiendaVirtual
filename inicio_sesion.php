<?php
    function cerrarSesion(){
          
            $name="id";
            $value= "";
            $expires=time() - 10;
            $path="/";
            $domain="";
            $secure=false;
            $HttpOnly=true;
               
            setcookie ($name,$value,$expires,$path,$domain,$secure,$HttpeOnly);
                           
            header ( "Location: ". strtok($_SERVER['REQUEST_URI'], '?'));
            exit;
    }
    
    function imprimirInicioSesion(){
        
        if(isset($_COOKIE["id"])){
            if($_GET["x"] == 1) cerrarSesion();
            else{
              $usuario = sacarUsuario($_COOKIE["id"]);
              
              return "<span class='text-primary m-2'>Bienvenid@, {$usuario["nombre"]}</span>
                <li>
                  <a class='nav-link mx-2' href='panel_usuario.php'>
                    <i class='material-icons' title='Panel de Usuario'>account_box</i>
                  </a>
                </li>
                <li class='nav-item mx-2'>
                  <a href='carrito.php' class='nav-link'>
                    <i class='material-icons' title='Carrito de la Compra'>shopping_cart</i>
                  </a>
                </li>
                <li class='nav-item mx-2'>
                  <a href='".$_SERVER['REQUEST_URI']."?x=1' class='nav-link'>
                    <i class='material-icons text-danger' title='Cerrar sesión'>exit_to_app</i>
                  </a>
                </li>";
            }
        }
        else{
            if(isset($_POST["nick"])){
              if(comprobarUsuario($_POST["nick"], $_POST["pass"])){
                
                $id = sacarId($_POST["nick"]);
                
                $name="id";
                $value= $id;
                $expires=time() + (10 * 365 * 24 * 60 * 60);
                $path="/";
                $domain="";
                $secure=false;
                $HttpOnly=true;
           
                setcookie ($name,$value,$expires,$path,$domain,$secure,$HttpeOnly);
                       
                header ( "Location: ".strtok($_SERVER['REQUEST_URI'], '?'));
                exit;
              }
              else return "<form class='form-inline' action='#' method='post'>
                        <div class='form-group'>
                          <label for='nickNav' class='text-light'>Nick</label>
                          <input type='text' id='nickNav' name='nick' class='form-control mx-sm-3' required='required'>
                          <label for='passNav' class='text-light'>Contraseña</label>
                          <input type='password' id='passNav' name='pass' class='form-control mx-sm-3' required title='Mínimo 10 carácteres' pattern='.{10,}'>
                        </div>
                        <button type='submit' class='btn btn-primary mr-3'>Iniciar Sesión</button>
                      </form>
                      <span class='text-warning mt-2'>¿No tienes cuenta? <a href='registro.php'>Regístrate</a></span>
                      <div class='modal fade bd-example-modal-sm' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-sm'>
                          <div class='modal-content'>
                            ...
                          </div>
                        </div>
                      </div>";
            }
            else{
              return "<form class='form-inline' action='#' method='post'>
                        <div class='form-group'>
                          <label for='nickNav' class='text-light'>Nick</label>
                          <input type='text' id='nickNav' name='nick' class='form-control mx-sm-3' required='required'>
                          <label for='passNav' class='text-light'>Contraseña</label>
                          <input type='password' id='passNav' name='pass' class='form-control mx-sm-3' required title='Mínimo 10 carácteres' pattern='.{10,}'>
                        </div>
                        <button type='submit' class='btn btn-primary mr-3'>Iniciar Sesión</button>
                      </form>
                      <span class='text-warning mt-2'>¿No tienes cuenta? <a href='registro.php'>Regístrate</a></span>";
            }
        }
    }
?>