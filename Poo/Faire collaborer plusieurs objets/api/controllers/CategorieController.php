<?php
require_once __DIR__ . '/../../classes/GestionCategorie.php';
class CategorieController {
    public function listCategories():void{
        $categorie=new GestionCategorie();
        $allCat=$categorie->getAll();
        foreach($allCat as $cat){
    echo $cat->getId() ."  ". $cat->getNom() ."  ".$cat->getColeur() ."  ".$cat->getIcone() ."<br>";
        }
    }
}
$controller=new CategorieController();
$controller->listCategories();