<?php
// Student ID: 2135XXXX
// Name: Rayan [Your Last Name]

require_once 'Database.php';

class ProductModel {
    private $db;
    private $conn;
    
    public function __construct() {
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }
    
    // Create
    public function createProduct($name, $description, $price, $category, $stock_quantity, $image_url = '') {
        $sql = "INSERT INTO products (name, description, price, category, stock_quantity, image_url) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdsds", $name, $description, $price, $category, $stock_quantity, $image_url);
        
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    
    // Read all
    public function getAllProducts() {
        $sql = "SELECT * FROM products ORDER BY created_at DESC";
        $result = $this->conn->query($sql);
        
        $products = [];
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
        return $products;
    }
    
    // Read one
    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $stmt->close();
        return $product;
    }
    
    // Update
    public function updateProduct($id, $name, $description, $price, $category, $stock_quantity, $image_url = '') {
        $sql = "UPDATE products 
                SET name=?, description=?, price=?, category=?, stock_quantity=?, image_url=? 
                WHERE id=?";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdsdsi", $name, $description, $price, $category, $stock_quantity, $image_url, $id);
        
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    
    // Delete
    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>