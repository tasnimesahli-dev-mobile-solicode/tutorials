<?php
require_once __DIR__ . '/Categorie.php';
class GestionCategorie {
    public function getAll() :array{
        return[
            new Categorie(1,"DevelopementWeb" ,"red" ,"+"),
            new Categorie(2 ,"Designe" , "Purple" ,  "£")
            ];
    }
}