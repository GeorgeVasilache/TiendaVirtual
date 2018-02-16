<?php
    //Clase que se utilizará para los productos del carrito de la compra
    class Producto{
        private $id;
        private $nombre;
        private $desc;
        private $categoria;
        private $precio;
        private $stock;
        private $img;
        private $cantidad;
        private $total;
        
        public function __construct($id){
            $this->id = $id;
            
            $producto = sacarProducto($id);
            
            $this->nombre = $producto["nombre"];
            $this->desc = $producto["descripcion"];
            $this->precio = $producto["precio"];
            $this->categoria = $producto["categoria"];
            $this->stock = $producto["stock"];
            $this->img = $producto["img"];
            $this->cantidad = 1;
            $this->total = $this->precio;
        }
        
        //GETTERS
        
        public function getId(){
            return $this->id;
        }
        
        public function getNombre(){
            return $this->nombre;
        }
        
        public function getDesc(){
            return $this->desc;
        }
        
        public function getPrecio(){
            return $this->precio;
        }
        
        public function getCantidad(){
            return $this->cantidad;
        }
        
        public function getCat(){
            return $this->categoria;
        }
        
        public function getTotal(){
            return $this->total;
        }
        
        public function getImg(){
            return $this->img;
        }
        
        public function getStock(){
            return $this->stock;
        }
        
        //METODOS
        
        public function aumentarCantidad(){
            $this->cantidad++;
            $this->total = $this->precio * $this->cantidad;
        }
        
        public function reducirCantidad(){
            $this->cantidad--;
            $this->total = $this->precio * $this->cantidad;
        }
    }
?>