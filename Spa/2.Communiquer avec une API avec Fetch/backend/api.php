<?php

header("Content-Type: application/json");

$fichier = "categories.json";
$data = json_decode(file_get_contents($fichier), true);

$method = $_SERVER["REQUEST_METHOD"];

if ($method === "GET") {

    echo json_encode($data);

}

elseif ($method === "POST") {

    $categorie = json_decode(file_get_contents("php://input"), true);

    $categorie["id"] = count($data["data"]) + 1;

    $data["data"][] = $categorie;

    file_put_contents($fichier, json_encode($data));

    echo json_encode([
        "message" => "Catégorie ajoutée"
    ]);

}

elseif ($method === "PUT") {

    $categorie = json_decode(file_get_contents("php://input"), true);

    foreach ($data["data"] as &$cat) {

        if ($cat["id"] == $categorie["id"]) {

            $cat["nom"] = $categorie["nom"];
            $cat["couleur"] = $categorie["couleur"];
            $cat["icone"] = $categorie["icone"];

        }

    }

    file_put_contents($fichier, json_encode($data));

    echo json_encode([
        "message" => "Catégorie modifiée"
    ]);

}

elseif ($method === "DELETE") {

    $categorie = json_decode(file_get_contents("php://input"), true);

    foreach ($data["data"] as $key => $cat) {

        if ($cat["id"] == $categorie["id"]) {

            unset($data["data"][$key]);

        }

    }

    $data["data"] = array_values($data["data"]);

    file_put_contents($fichier, json_encode($data));

    echo json_encode([
        "message" => "Catégorie supprimée"
    ]);

}

?>