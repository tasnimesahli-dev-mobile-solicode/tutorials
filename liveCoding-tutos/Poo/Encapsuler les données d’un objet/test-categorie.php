<?php
require_once 'categorie.php';
$categorie1=new categorie("developement" , "red");
echo $categorie1->getName() ."-".$categorie1->getColour()."<br>";
$categorie1->setName("designe");
$categorie1->setColour("white");
echo $categorie1->getName() ."-".$categorie1->getColour();