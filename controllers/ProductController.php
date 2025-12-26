<?php
// Student ID: 2135XXXX
// Name: Rayan [Your Last Name]

require_once __DIR__ . '/../models/ProductModel.php';
session_start();

$productModel = new ProductModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    switch($action) {
        case 'create':
            $name = trim($_POST['name'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $price = floatval($_POST['price'] ?? 0);
            $category = trim($_POST['category'] ?? '');
            $stock_quantity = intval($_POST['stock_quantity'] ?? 0);
            $image_url = trim($_POST['image_url'] ?? '');
            
            if ($productModel->createProduct($name, $description, $price, $category, $stock_quantity, $image_url)) {
                $_SESSION['message'] = "Product created successfully!";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error creating product!";
                $_SESSION['message_type'] = "error";
            }
            
            header("Location: ../views/products.php");
            exit();
            
        case 'update':
            $id = intval($_POST['id'] ?? 0);
            $name = trim($_POST['name'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $price = floatval($_POST['price'] ?? 0);
            $category = trim($_POST['category'] ?? '');
            $stock_quantity = intval($_POST['stock_quantity'] ?? 0);
            $image_url = trim($_POST['image_url'] ?? '');
            
            if ($productModel->updateProduct($id, $name, $description, $price, $category, $stock_quantity, $image_url)) {
                $_SESSION['message'] = "Product updated successfully!";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error updating product!";
                $_SESSION['message_type'] = "error";
            }
            
            header("Location: ../views/products.php");
            exit();
            
        case 'delete':
            $id = intval($_POST['id'] ?? 0);
            
            if ($productModel->deleteProduct($id)) {
                $_SESSION['message'] = "Product deleted successfully!";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error deleting product!";
                $_SESSION['message_type'] = "error";
            }
            
            header("Location: ../views/products.php");
            exit();
    }
}
?>