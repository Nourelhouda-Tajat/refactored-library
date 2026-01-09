<?php
class Book{
    private ?int $id;
    private string $title;
    private Author $author;
    private float $price;
    private int $stock;

    public function __construct($id, $title, $author, $price, $stock){
        $this->id= $id;
        $this->title= $title;
        $this->author= $author;
        $this->price= $price;
        $this->stock= $stock;
    }

    public function getId() {return $this->id;}
    public function getTitle() {return $this->title;}
    public function getAuthor() {return $this->author;}
    public function getPrice() {return $this->price;}
    public function getStock() {return $this->stock;}

}
?>

