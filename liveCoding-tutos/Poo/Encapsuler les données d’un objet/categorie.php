<?php 
class categorie {
    private int $id;
    private string $nom;
    private string $colour;
    private string $icon;

    public function __construct(int $id , string $nom , string $colour , string $icon) {
        $this->id=$id;
        $this->nom=$nom;
        $this->colour=$colour;
        $this->icon=$icon;
    }
public function getId() :int {
        return $this->id;
    }
public function getNom() :string {
        return $this->nom;
    }
public function getColour() :string {
        return $this->colour;
    }
public function getIcon() :string {
        return $this->icon;
    }
public function setId(int $id) :void{
    $this->id=$id;
}
public function setNom(string $nom) :void{
    $this->nom=$nom;
}
public function setColour(string $colour) :void{
    $this->colour=$colour;
}
public function setIcon(string $icon) :void{
    $this->icon=$icon;
}
}
?>