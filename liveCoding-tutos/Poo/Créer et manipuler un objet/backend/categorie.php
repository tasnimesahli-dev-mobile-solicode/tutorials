<?php

class Categorie {
    public $id;
    public $nom;
    public $colour;
    public $icon;

    public function __construct($id , $nom , $colour , $icon) {
        $this->id=$id;
        $this->nom=$nom;
        $this->colour=$colour;
        $this->icon=$icon;
    }

    public function afficher() {
        echo $this->id ."-" .$this->nom ."-" .$this->colour ."-" .$this->icon;
    }
}