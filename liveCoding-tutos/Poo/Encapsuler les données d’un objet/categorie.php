<?php
class categorie {
    private $name;
    private $colour;

    public function __construct($name , $colour){
        $this->name=$name;
        $this->colour=$colour;
    }
    public function getName() :string {
        return $this->name;
    }
    public function getColour() :string {
        return $this->colour;
    }
    public function setName(string $name){
        $this->name=$name;
    }
    public function setColour(string $colour) {
        $this->colour=$colour;
    }


}