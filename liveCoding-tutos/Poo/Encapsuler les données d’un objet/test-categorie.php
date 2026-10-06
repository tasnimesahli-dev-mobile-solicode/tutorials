<?php
require_once 'categorie.php';
$categorie1=new categorie(1 , "Designe" , "red" , "star");
echo $categorie1->getId();
echo $categorie1->getNom();
echo $categorie1->getColour();
echo $categorie1->getIcon();
$categorie1->setId(1);
$categorie1->setNom("Developement");
$categorie1->setColour("yellow");
$categorie1->setIcon("like");