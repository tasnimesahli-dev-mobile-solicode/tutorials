 <?php
class Categorie {
    private int $id;
    private string $nom;
    private string $coleur;
    private string $icone;

    public function __construct($id , $nom , $coleur , $icone){
        $this->id=$id;
        $this->nom=$nom;
        $this->coleur=$coleur;
        $this->icone=$icone;
    }
    public function getId() :int{
        return $this->id;
    }
    public function getNom() :string{
        return $this->nom;
    }
    public function getCouleur() :string{
        return $this->coleur;
    }
    public function getIcone() :string {
        return $this->icone;
    }
}