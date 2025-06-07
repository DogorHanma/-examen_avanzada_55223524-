<?php

class ProductoController {
    private $productoModel;

    public function __construct($productoModel) {
        $this->productoModel = $productoModel;
    }

    
    public function registrarProducto() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $cantidad = $_POST['cantidad'];
            $precio_unitario = $_POST['precio_unitario'];
            
            $this->productoModel->registrar($nombre, $cantidad, $precio_unitario);
            header('Location: index.php?action=listar');
        } else {
            include 'views/registrar.php';
        }
    }


    public function listarProductos() {
        $productos = $this->productoModel->listar();
        include 'views/listar.php';
    }
}
?>
