<?php
require_once __DIR__ . '/src/Services/LibraryService.php';
require_once __DIR__ . '/src/Entities/Book.php';
require_once __DIR__ . '/src/Entities/Author.php';

$libraryService = new LibraryService();

echo "LISTE DES LIVRES <br><br>";

$books = $libraryService->displayBooks();

foreach ($books as $book) {
    echo 
         $book->getTitle(). " | Auteur : " . $book->getAuthor()->getName(). " | Prix : " . $book->getPrice() . "€". " | Stock : " . $book->getStock(). "<br><br>";
}

echo "RECHERCHE D'UN LIVRE <br><br>";

$title = "1984";
$book = $libraryService->searchByTitle($title);

if ($book) {
    echo "Livre trouvé : ". $book->getTitle(). " par " . $book->getAuthor()->getName(). "<br><br>";
} else {
    echo "Livre $title introuvable <br><br>";
}

echo "AJOUT D'UN LIVRE <br><br>";

try {
    $author = new Author(1, "George Orwell");
    $newBook = new Book(null, "Animal Farm", $author, 20, 7);

    $libraryService->addBook($newBook);
    echo "Livre ajouté avec succès <br><br>";

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br><br>";
}
