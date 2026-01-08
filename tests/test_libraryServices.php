<?php
require_once __DIR__ . '/../src/Services/LibraryService.php';

$service = new LibraryService();

$books = $service->displayBooks();

$book = $service->searchByTitle("1984");

if ($book) {
    echo "Trouvé via service : " . $book->getTitle();
}
