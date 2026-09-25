<?php
class categorie {
    private int $id;
    private string $nom;
    private string $couleur;
    private string $icon;
  
    public function getId() :int {
        return $this->id;
    }
    public function getNom() :string {
        return $this->nom;
    }
    public function getCouleur() :string {
        return $this->couleur;
    }
    public function getIcon() :string {
        return $this->icon;
    }
    public function setNom(string $newNom) :void{
        $this->nom=$newNom;
    }
    public function setId(int $newId) :void{
        $this->id=$newId;
    }
    public function setCouleur(string $newCouleur) :void{
        $this->couleur=$newCouleur;
    }
    public function setIcon(string $newIcon) :void{
        $this->icon=$newIcon;
    }
}