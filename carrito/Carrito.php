<?php
    //Clase que se instanciará en la variable de sesión y a la que se le irán añadiendo objetos de tipo Producto
    class Carrito{
        //Array de productos
        private $productos;
        //Total del carrito
        private $total;
        
        //Constructor
        public function __construct(){
            $this->productos = array();
            $this->total = 0;
        }
        
        //GETTERS
        
        public function getProductos (){
            return $this->productos;
        }
        
        public function getProducto ($id){
            
            foreach($this->productos as $producto){
                if ($producto->getId() == $id) return $producto;
            }
            
            return false;
        }
        
        public function getTotal(){
            return $this->total;
        }
        
        public function setTotal ($total){
            return $this->total = $total;
        }
        
        //METODOS
        
        //Función que añade un roducto al carrito. Si el producto introducido ya está, se aumenta la cantidad del mismo
        public function anyadirProducto ($producto){
            
            /* Comprobar si el producto ya ha sido añadido a la cesta, recorriendo los productos de la misma, y si el identificador del producto que se quiere
            introducir coincide con alguno de los que ya hay en la cesta, se incrementa la cantidad de dicho producto dentro de la cesta */
            
            for($i = 0 ; $i < count($this->productos) ; $i++){
                if($this->productos[$i]->getId() == $producto->getId()){
                    $this->productos[$i]->aumentarCantidad();
                    $this->calcularTotal();
                    return;
                }
            }
            
            $this->productos[] = $producto;
            $this->calcularTotal();
        }
        
        //Función que elimina una unidad del producto especificado. Si la unidad eliminada era la última, se remueve del array de productos
        public function quitarProducto ($id){
            
            /* A partir del id, se buscará un objeto con dicho id en los productos y se le restará 1 a la cantidad. Si hecho hesto la cantidad es igual a 0, el objeto
            es removido del carrito */
            
            for($i = 0 ; $i < count($this->productos) ; $i++){
                if($this->productos[$i]->getId() == $id){
                    $this->productos[$i]->reducirCantidad();
                    if($this->productos[$i]->getCantidad() == 0) array_splice($this->productos, $i, 1);
                    $i = count($this->productos);
                }
            }
            
            $this->calcularTotal();
            
        }
        //Función qe calcula el total del carrito
        public function calcularTotal (){
            
            $this->setTotal(0);
            
            //recorremos todos los productos y sumamos el precio de cada productos por la cantidad de productos de cada tipo
            for($i = 0 ; $i < count($this->productos) ; $i++){
                $this->total += $this->productos[$i]->getTotal();
            }
        }
        
        //Función que elimina todas las unidades de un producto del carrito
        public function eliminarProducto ($id){
             for($i = 0 ; $i < count($this->productos) ; $i++){
                if($this->productos[$i]->getId() == $id){
                    array_splice($this->productos, $i, 1);
                    $this->calcularTotal();
                    $i = count($this->productos);
                }
            }
        }
        
        
    }
?>