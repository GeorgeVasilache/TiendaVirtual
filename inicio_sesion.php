<?php
    //Cierra la sesión actual borrando al cookie y recarla la página
    function cerrarSesion (){
          
            borrarCookie();
            
            //Si hay un carrito creado, se destruye la variable de sesión
            if(isset($_SESSION["carrito"])) session_destroy();
            
            //Quitamos el parámetro x de la url
            $link = preg_replace('~(\?|&)x=[^&]*~','$1', $_SERVER['REQUEST_URI']);
            
            header ( "Location: ". $link);
            exit;
    }
    
    //Cierra la borrando la cookie pero si recargar la página
    function borrarCookie (){
            $name="id";
            $value= "";
            $expires=time() - 10;
            $path="/";
            $domain="";
            $secure=false;
            $HttpOnly=true;
               
            setcookie ($name,$value,$expires,$path,$domain,$secure,$HttpeOnly);
    }
    
    //Si no hay una sesión abierta, imprime el formulario de inicio de sesion, si hay una sesión abierta, imprime los controles del usuario
    function imprimirInicioSesion (){
        
        if(isset($_COOKIE["id"])){
            if($_GET["x"] == 1) cerrarSesion();
            else{
              $usuario = sacarUsuario($_COOKIE["id"]);
              
              //Comprobamos si ya hay parámetros get en la url
              
              if(strpos($_SERVER["REQUEST_URI"], "?") === false) $url = $_SERVER['REQUEST_URI']."?x=1";
              else                                               $url = $_SERVER['REQUEST_URI']."&x=1";
              
              return "<span class='text-primary m-2'>Bienvenid@, {$usuario["nombre"]}</span>
                <li>
                  <a class='nav-link mx-2' href='/TiendaVirtual/panel_usuario/panel_usuario.php'>
                    <i class='material-icons' title='Panel de Usuario'>account_box</i>
                  </a>
                </li>
                <li class='nav-item mx-2'>
                  <a href='/TiendaVirtual/carrito/carrito.php' class='nav-link'>
                    <i class='material-icons' title='Carrito de la Compra'>shopping_cart</i>
                  </a>
                </li>
                <li class='nav-item mx-2'>
                  <a href='".$url."' class='nav-link'>
                    <i class='material-icons text-danger' title='Cerrar sesión'>exit_to_app</i>
                  </a>
                </li>";
            }
        }
        else{
            if(isset($_POST["nick"])){
              //Si las credenciales proporcionadas son correctas, se crea la cookie
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
                
                //Si nos encntramos en el index, recargamos la página sin parámetros get
                if (substr($_SERVER['REQUEST_URI'], 44, 5 ) === "index"){
                  header ( "Location: ".strtok($_SERVER['REQUEST_URI'], '?'));
                  exit;
                }
                else{
                  header ( "Location: #");
                  exit;
                }
                
              }
              else return "<form class='form-inline' action='#' method='post'>
                        <div class='form-group'>
                          <input type='text' id='nickNav' name='nick' class='form-control mx-sm-3 border border-danger' placeholder = 'Nick'required='required'>
                          <input type='password' id='passNav' name='pass' class='form-control mx-sm-3 border border-danger' placeholder = 'Contraseña' required title='Mínimo 10 carácteres' pattern='.{10,}'>
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
                          <input type='text' id='nickNav' name='nick' class='form-control mx-sm-3' placeholder = 'Nick' required='required'>
                          <input type='password' id='passNav' name='pass' class='form-control mx-sm-3' placeholder ='Contraseña' required title='Mínimo 10 carácteres' pattern='.{10,}'>
                        </div>
                        <button type='submit' class='btn btn-primary mr-3'>Iniciar Sesión</button>
                      </form>
                      <span class='text-warning mt-2'>¿No tienes cuenta? <a href='/TiendaVirtual/registro/registro.php'>Regístrate</a></span>";
            }
        }
    }
    
    //Función que dice si hay una sesión abierta o no
    function sesionAbierta (){
      
      if(isset($_COOKIE["id"])) return true;
      else return false;
    }
?>