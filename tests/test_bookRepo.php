<?php
require_once __DIR__ . '/../src/Repositories/BookRepository.php';

$repo = new BookRepository();
$books = $repo->findAll();


$book = $repo->findByTitle("1984");

if ($book) {
    echo "Livre trouvé : " . $book->getTitle() . "\n";
    echo "Livre trouvé : " . $book->getTitle() . " par " . $book->getAuthor()->getName() . "\n";
} else {
    echo "Livre non trouvé\n";
}
