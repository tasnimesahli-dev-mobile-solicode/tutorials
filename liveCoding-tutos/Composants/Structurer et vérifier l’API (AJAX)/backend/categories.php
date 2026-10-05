<?php
header('Content-Type:application/json');

$categories=[
    ["id"=>1,
      "nom"=>"Design"
    ],[
        "id"=>2,
        "nom"=>"Developement"
    ]
];
echo json_encode($categories);