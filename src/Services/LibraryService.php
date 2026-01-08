<?php
require_once '/../Repositories/BookRepository.php';

class LibraryService{
    private $db;
    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function displayBooks(){

    }
    public function addBook(Book $book){

    }
    public function searchByTitle(string $title){
        
    }
}
?>