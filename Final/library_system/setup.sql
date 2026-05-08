-- Create the database
CREATE DATABASE IF NOT EXISTS library_db;

-- Select it
USE library_db;

-- Create the books table
CREATE TABLE IF NOT EXISTS books (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    title      VARCHAR(200) NOT NULL,
    author     VARCHAR(150) NOT NULL,
    category   VARCHAR(100) NOT NULL,
    status     ENUM('Available', 'Borrowed') DEFAULT 'Available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Add some sample books so the table isn't empty
INSERT INTO books (title, author, category, status) VALUES
('Introduction to Algorithms', 'Thomas H. Cormen', 'Computer Science', 'Available'),
('Clean Code', 'Robert C. Martin', 'Computer Science', 'Borrowed'),
('The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 'Available');