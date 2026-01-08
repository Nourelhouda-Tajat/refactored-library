CREATE DATABASE Library;
USE Library;

CREATE TABLE Author (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    bio VARCHAR(200) DEFAULT NULL

);

CREATE TABLE Book (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    price INT NOT NULL,
    stock INT DEFAULT 0,
    author_id INT,
    FOREIGN KEY (author_id) REFERENCES Author(id) 
);

INSERT INTO Author(name, bio) Values
('George Orwell', 'Auteur de romans dystopiques'),
('J.K. Rowling', 'Auteur de fantasy'),
('Robert Martin', 'Expert en clean code'),
('Eric Freeman', 'Spécialiste design patterns'),
('Paul Barry', 'Auteur technique PHP');

INSERT INTO Book(title, price, stock, author_id) Values
('1984', 25, 10, 1),
('Harry Potter', 30, 8, 2),
('Clean Code', 45, 5, 3),
('Design Patterns', 50, 4, 4),
('Head First PHP', 35, 6, 5);
