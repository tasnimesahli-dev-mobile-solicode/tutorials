
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
    public function createCategorie(Categorie $categorie){
        $data= json_decode(file_get_contents(self::$dataFile),true)  ?? [];
        $data[]=[
          'id'=>count($data)+1,
          'nom'=>$categorie->getNom(),
          'couleur'=>$categorie->getCouleur(),
           'icone'=>$categorie->getIcone()
        ];
        return file_put_contents(self::$dataFile , json_encode($data));

    }
    public function updateCategorie(Categorie $categorie){
    $data= json_decode(file_get_contents(self::$dataFile),true);
    foreach($data as $id=>$cat){
        if($cat['id']===$categorie->getId()){
        $data[$id]['id']=$categorie->getId();
        $data[$id]['nom']=$categorie->getNom();
        $data[$id]['couleur']=$categorie->getCouleur();
        $data[$id]['icone']=$categorie->getIcone();
        return file_put_contents(self::$dataFile , json_encode($data));

        }
    }

    }
    public function deleteCategorie(Categorie $categorie){
    $data= json_decode(file_get_contents(self::$dataFile),true);
    foreach($data as $id=>$cat){ 
    if($cat['id']===$categorie->getId()){
     unset($data[$id]);
     $data = array_values($data);
        return file_put_contents(self::$dataFile , json_encode($data));
    }
}}}
$gestion = new GestionCategorie();

$categories = $gestion->getAll();

foreach ($categories as $categorie) {
    echo $categorie->getNom() . "<br>";
}