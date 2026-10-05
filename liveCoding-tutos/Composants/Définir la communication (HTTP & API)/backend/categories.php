<?php
header('Content-Type:application/json');
$categories=[
    [
        "id"=>1,
        "nom"=>"developement"
    ],
    [
        "id"=>2,
        "nom"=>"designe"
    ]
];
echo json_encode($categories);