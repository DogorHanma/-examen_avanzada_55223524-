<?php

require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../../config/database.php';

class ProductController {
    private $product;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->product = new Product($db);
    }

    public function listProducts() {
        $stmt = $this->product->getAll();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../views/product_list.php';
    }

    public function registerProduct() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->product->nombre = $_POST['nombre'] ?? '';
            $this->product->cantidad = $_POST['cantidad'] ?? 0;
            $this->product->precio_unitario = $_POST['precio_unitario'] ?? 0.0;

            if ($this->product->register()) {
                $message = "Producto registrado exitosamente.";
                header("Location: index.php?action=list"); 
                exit();
            } else {
                $message = "Error al registrar el producto.";
            }
        }
        require_once __DIR__ . '/../views/product_register.php';
    }
}
?>