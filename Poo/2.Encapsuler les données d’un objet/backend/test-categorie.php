<?php
require_once'categorie.php';
$categorie1=new categorie();
$categorie1->setId(1);
$categorie1->setNom("DEV");
$categorie1->setCouleur("Red");
$categorie1->setIcon("STAR");
$id=$categorie1->getId();
$nom=$categorie1->getNom();
$couleur=$categorie1->getCouleur();
$icon=$categorie1->getIcon();
echo $id ."-".$nom ."-" .$couleur ."-" .$icon;