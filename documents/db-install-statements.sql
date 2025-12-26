-- Student ID: 2135XXXX
-- Name: Rayan [Your Last Name]
-- CPIT-405 Lab Assignment 3 - Database Installation

-- Create Database
CREATE DATABASE IF NOT EXISTS cpit405_project;
USE cpit405_project;

-- Products Table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(50),
    stock_quantity INT DEFAULT 0,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Categories Table
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample Data for Categories
INSERT INTO categories (name, description) VALUES
('Electronics', 'Electronic devices and gadgets'),
('Clothing', 'Apparel and fashion items'),
('Books', 'Books and publications'),
('Home & Garden', 'Home improvement and garden supplies');

-- Sample Data for Products
INSERT INTO products (name, description, price, category, stock_quantity, image_url) VALUES
('Laptop HP 15', 'High-performance laptop with 16GB RAM', 3500.00, 'Electronics', 15, 'laptop.jpg'),
('Wireless Mouse', 'Ergonomic wireless mouse', 85.00, 'Electronics', 50, 'mouse.jpg'),
('Cotton T-Shirt', 'Comfortable cotton t-shirt', 75.00, 'Clothing', 100, 'tshirt.jpg'),
('Programming Book', 'Learn PHP and MySQL', 120.00, 'Books', 30, 'book.jpg'),
('Garden Tools Set', 'Complete gardening tool set', 250.00, 'Home & Garden', 20, 'tools.jpg');