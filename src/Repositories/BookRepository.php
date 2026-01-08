<?php
require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Entities/Book.php';
require_once __DIR__ . '/../Entities/Author.php';

class BookRepository{
    private $db;
    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findAll(): array {
        $books = [];
        $stmt = $this->db->prepare( 
        "SELECT b.*, a.id AS author_id, a.name, a.bio FROM Book b
        INNER JOIN Author a ON a.id = b.author_id"
        );
        $stmt->execute();
        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $res) {
            $author = new Author(
                $res['author_id'],
                $res['name'],
                $res['bio']
            );

            $books[] = new Book(
                $res['id'],
                $res['title'],
                $author,
                $res['price'],
                $res['stock']
            );
        }

        return $books; 
    }
    public function findByTitle($title): ?Book {
        $stmt = $this->db->prepare(
        "SELECT b.*, a.id AS author_id, a.name, a.bio FROM Book b
        INNER JOIN Author a ON a.id = b.author_id WHERE b.title = :title"
        );
        $stmt->execute(["title" => $title]);
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            return null;
        } 
        $author = new Author(
                $result['id'],
                $result['name'],
                $result['bio']
            );

            $book = new Book(
                $result['id'],
                $result['title'],
                $author,
                $result['price'],
                $result['stock']
            );
        return $book;
    }

    public function save(Book $book) : bool {
        $stmt = $this->db->prepare(
            "INSERT INTO Book (title, price, stock, author_id)
             VALUES (:title, :price, :stock, :author_id)"
        );
        return $stmt->execute([
            'title'=> $book['title'], 
            'price'=> $book['price'], 
            'stock'=> $book['stock'], 
            'author_id'=> $book['author_id']
        ]);
    }
}
?>

