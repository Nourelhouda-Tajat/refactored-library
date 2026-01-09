<?php
class Author{
    private int $id;
    private string $name;
    private string $bio;

    public function __construct($id, $name, $bio=''){
        $this->id=$id;
        $this->name= $name;
        $this->bio=$bio;
    }

    public function getId(){return $this->id;}
    public function getName(){return $this->name;}
    public function getBio(){return $this->bio;}

    
}
?>