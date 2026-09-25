<?php
class categorie {
    public $id;
    public $nom;
    public $couleur;
    public $icon;

    public function __construct($id , $nom , $couleur , $icon) {
        $this->id=$id;
        $this->nom=$nom;
        $this->couleur=$couleur;
        $this->icon=$icon;
    }
    public function afficher(){
        echo $this->id ."-" .$this->nom ."-" .$this->couleur ."-" .$this->icon;
    }
}
$categorie1=new categorie("1" , "dev" , "red" , "point");
$categorie1->afficher();