<?php
    class Carrito{
        private $productos;
        private $total;
        
        public function __construct(){
            $this->productos = array();
            $this->total = 0;
        }
        
        //GETTERS
        
        public function getProductos(){
            return $this->productos;
        }
        
        public function getTotal(){
            return $this->total;
        }
        
        public function setTotal($total){
            return $this->total = $total;
        }
        
        //METODOS
        
        public function anyadirProducto($producto){
            
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
        
        public function quitarProducto($id){
            
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
        
        public function calcularTotal(){
            
            $this->setTotal(0);
            
            //recorremos todos los productos y sumamos el precio de cada productos por la cantidad de productos de cada tipo
            for($i = 0 ; $i < count($this->productos) ; $i++){
                $this->total += $this->productos[$i]->getTotal();
            }
        }
        
        
    }
?>