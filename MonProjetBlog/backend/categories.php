<?php
header('Content-Type: application/json');
$categories= [
    ["id" =>"1" , "nom" => "Développement"],
    ["id" =>"2" , "nom" =>"Design"]
];
echo json_encode($categories);
?>