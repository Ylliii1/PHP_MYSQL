-- Create the database
CREATE DATABASE IF NOT EXISTS admin_panel;
USE admin_panel;

-- Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- For hashed passwords
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Admin Table
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- For hashed passwords
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample Admin User (Username: admin, Password: password123)
INSERT INTO admin (username, email, password) 
VALUES ('admin', 'admin@example.com', MD5('password123'));

-- Sample User Records
INSERT INTO users (username, email, password) VALUES
('john_doe', 'john@example.com', MD5('john123')),
('jane_doe', 'jane@example.com', MD5('jane123'));
