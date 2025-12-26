<?php
// Student ID: 2135XXXX
// Name: Rayan [Your Last Name]

session_start();
require_once __DIR__ . '/../models/ProductModel.php';

$productModel = new ProductModel();
$products = $productModel->getAllProducts();

$message = $_SESSION['message'] ?? '';
$message_type = $_SESSION['message_type'] ?? '';
unset($_SESSION['message'], $_SESSION['message_type']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Product Management System</h1>
            <p>CPIT-405 Lab Assignment 3</p>
        </header>

        <?php if ($message): ?>
            <div class="message <?php echo $message_type; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <div class="actions">
            <button onclick="showAddForm()" class="btn btn-primary">Add New Product</button>
        </div>

        <div id="addForm" class="form-container" style="display: none;">
            <h2>Add New Product</h2>
            <form action="../controllers/ProductController.php" method="POST">
                <input type="hidden" name="action" value="create">
                
                <label>Product Name:</label>
                <input type="text" name="name" required>
                
                <label>Description:</label>
                <textarea name="description" rows="4" required></textarea>
                
                <label>Price (SAR):</label>
                <input type="number" name="price" step="0.01" min="0" required>
                
                <label>Category:</label>
                <input type="text" name="category" required>
                
                <label>Stock Quantity:</label>
                <input type="number" name="stock_quantity" min="0" required>
                
                <label>Image URL:</label>
                <input type="text" name="image_url">
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Add Product</button>
                    <button type="button" onclick="hideAddForm()" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
        </div>

        <div class="table-container">
            <h2>All Products</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price (SAR)</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)): ?>
                        <tr><td colspan="7" class="text-center">No products found</td></tr>
                    <?php else: ?>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td><?php echo htmlspecialchars($product['name']); ?></td>
                                <td><?php echo htmlspecialchars(substr($product['description'], 0, 50)) . '...'; ?></td>
                                <td><?php echo number_format($product['price'], 2); ?></td>
                                <td><?php echo htmlspecialchars($product['category']); ?></td>
                                <td><?php echo $product['stock_quantity']; ?></td>
                                <td>
                                    <button onclick="deleteProduct(<?php echo $product['id']; ?>)" class="btn btn-delete">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../js/script.js"></script>
</body>
</html>