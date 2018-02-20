<?php
    //Clase que se utilizará para los productos del carrito de la compra
    class Producto{
        //Datos del producto
        private $id;
        private $nombre;
        private $desc;
        private $categoria;
        private $precio;
        private $stock;
        private $img;
        
        //Cantidad de unidades del producto en el carrito
        private $cantidad;
        
        //Total del coste de todas las unidades
        private $total;
        
        //Constructor
        public function __construct($id){
            $this->id = $id;
            
            //Sacamos los datos del producto de la base de datos
            $producto = sacarProducto($id);
            
            //Rellenamos los atributos con los datos
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
        
        //Función que aumenta la cantidad del producto
        public function aumentarCantidad(){
            $this->cantidad++;
            
            //Volvemos a calcular el total tras los cambios
            $this->total = $this->precio * $this->cantidad;
        }
        
        //Función que reduce la cantidad del producto
        public function reducirCantidad(){
            $this->cantidad--;
            
            //Volvemos a calcular el total tras los cambios
            $this->total = $this->precio * $this->cantidad;
        }
    }
?>