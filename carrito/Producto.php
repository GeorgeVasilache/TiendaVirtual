<?php
    class Producto{
        private $id;
        private $nombre;
        private $desc;
        private $categoria;
        private $precio;
        private $cantidad;
        private $total;
        
        public function __construct($id){
            $this->id = $id;
            
            $producto = sacarProducto($id);
            
            
            $this->nombre = $producto["nombre"];
            $this->desc = $producto["descripcion"];
            $this->precio = $producto["precio"];
            $this->categoria = $producto["categoria"];
            $this->cantidad = 1;
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
        
        //METODOS
        
        public function aumentarCantidad(){
            $this->cantidad++;
            $this->total = $this->precio * $this->cantidad;
        }
        
        public function reducirCantidad(){
            $this->cantidad--;
        }
    }
?>