<?php
require_once __DIR__ . '/../Repositories/BookRepository.php';


class LibraryService{
    private BookRepository $bookRepo;
    public function __construct(){
        $this->bookRepo = new BookRepository();
    }

    public function displayBooks() : array{
        return $this->bookRepo->findAll();
    }

    public function addBook(Book $book) :bool{
        return $this->bookRepo->save($book);
    }

    public function searchByTitle(string $title) : ?Book {
        return $this->bookRepo->findByTitle($title);
    }
}
?>