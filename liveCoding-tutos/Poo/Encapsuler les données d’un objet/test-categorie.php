<?php
require_once 'categorie.php';
$categorie1=new Categorie(1 , "Designe" , "red" , "star");
echo "Before ".$categorie1->getId() ."-".$categorie1->getNom()."-" .$categorie1->getColour()."-".$categorie1->getIcon()."<br>";
$categorie1->setId(1);
$categorie1->setNom("Developement");
$categorie1->setColour("yellow");
$categorie1->setIcon("like");
echo "after" .$categorie1->getId()."-".$categorie1->getNom()."-".$categorie1->getColour()."-".$categorie1->getIcon();