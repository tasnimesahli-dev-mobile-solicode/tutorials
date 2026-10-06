<?php
header('Content-Type: application/json');
function getCategorie(){
$data=file_get_contents('data/data.json');
echo $data;
}
function ajouterCategorie() {
    $data=json_decode(file_get_contents('data/data.json'),true);
    $input=json_decode(file_get_contents('php://input'),true);
    $data[]=[
        "id"=>count($data)+1,
        "nom"=>$input["nom"],
        "description"=>$input["description"]
    ];
    $categories=json_encode($data );
    file_put_contents('data/data.json' , $categories);
    echo $categories;
}
function deleteCategorie() {
    $data=json_decode(file_get_contents('data/data.json'),true);
    $input=json_decode(file_get_contents('php://input'),true);
foreach($data as $key =>$categorie){
    if($categorie["id"]===$input["id"]) {
     unset($data[$key]);
    }
}
$categories = json_encode($data);
file_put_contents('data/data.json', $categories);
echo $categories;
}
$methode = $_SERVER['REQUEST_METHOD'];

if ($methode === "GET") {
    getCategorie();
}

if ($methode === "POST") {
    ajouterCategorie();
}

if ($methode === "DELETE") {
    deleteCategorie();
}