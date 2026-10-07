<?php
header('Content-Type:application/json');
$FILE_PATH=__DIR__. '/data/data.json';
$method=$_SERVER['REQUEST_METHOD'];
if($method==='GET'){
    $categories=file_get_contents($FILE_PATH);
    echo $categories;
}
if($method==='POST'){
    $categories=json_decode(file_get_contents($FILE_PATH),true);
    $input=json_decode(file_get_contents('php://input'),true);
    $categories[]=[
        "id"=>count($categories)+1,
        "nom"=>$input["nom"],
        "description"=>$input["description"]
    ];
    $newCat=json_encode($categories);
    file_put_contents($FILE_PATH , $newCat);
    echo $newCat;
}