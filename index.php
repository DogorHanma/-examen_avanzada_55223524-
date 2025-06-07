<?php


require_once __DIR__ . '/../app/controllers/ProductController.php';

$controller = new ProductController();


$action = $_GET['action'] ?? 'list'; 

switch ($action) {
    case 'list':
        $controller->listProducts();
        break;
    case 'register':
        $controller->registerProduct();
        break;
    default:
        $controller->listProducts(); 
        break;
}
?>