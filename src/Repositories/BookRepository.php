<?php
require_once '/../Core/Database.php';

class BookRepository{
    private $db;
    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findAll(): array {
        $stmt = $this->db->prepare( 
            "SELECT b.title, b.price, b.stock, a.name FROM Book b
            INNER JOIN Author a ON a.id=b.author_id ORDER BY b.id"
        );
        $stmt->execute();
        return $stmt->fetchAll();

    }
    public function findByTitle($title): Book {
        $stmt = $this->db->prepare(
            "SELECT b.title, b.price, b.stock, a.name FROM Book b
            INNER JOIN Author a ON a.id=b.author_id WHERE b.title= :title"
        );
        $stmt->execute(["title" => $title]);
        return $stmt->fetch();

    }
    public function save(Book $book) : bool {
        $stmt = $this->db->prepare(
            "INSERT INTO Book(title, price, stock, author_id) Values ()"
        );
    }
}
?>