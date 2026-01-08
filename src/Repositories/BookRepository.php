<?php
require_once '/../Core/Database.php';
require_once '/../Entities/Book.php';
require_once '/../Entities/Author.php';

class BookRepository{
    private $db;
    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findAll(): array {
        $books = [];
        $stmt = $this->db->prepare( 
            "SELECT b.title, b.price, b.stock, a.name FROM Book b
            INNER JOIN Author a ON a.id=b.author_id ORDER BY b.id"
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
    public function findByTitle($title): Book {
        $stmt = $this->db->prepare(
            "SELECT b.title, b.price, b.stock, a.name FROM Book b
            INNER JOIN Author a ON a.id=b.author_id WHERE b.title= :title"
        );
        $stmt->execute(["title" => $title]);
        $stmt->fetch();

    }
    public function save(Book $book) : bool {
        $stmt = $this->db->prepare(
           
        );
    }
}
?>

