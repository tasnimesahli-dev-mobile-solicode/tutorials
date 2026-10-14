<?php
require_once 'Categorie.php';
class GestionCategorie {
    private static $dataFile='../data/data.json';
    public function getAll() :array{
    if(!file_exists(self::$dataFile) )return [];
    $data=json_decode(file_get_contents(self::$dataFile),true);
    $categories=[];
    foreach($data as $row){
        $categories[]= new Categorie($row['id'] , $row['nom'] , $row['couleur'] , $row['icone']);
    }
    return $categories;
    }

     public function createCategorie($nom , $couleur, $icone) :categorie{
     $categorie=$this->getAll();
     $id=count($categorie)+1;
     $newCategorie=new Categorie($id , $nom , $couleur , $icone);
     $categories[]=$categorie;
     file_put_contents(self::$dataFile,json_encode($categories))
     }
}