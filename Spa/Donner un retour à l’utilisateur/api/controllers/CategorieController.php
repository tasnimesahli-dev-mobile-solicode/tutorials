<?php

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../../backend/classes/GestionCategorie.php';

$gestion = new GestionCategorie();
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $categories = $gestion->getAll();
    $data = [];

    foreach ($categories as $cat) {
        $data[] = [
            'id' => $cat->getId(),
            'nom' => $cat->getNom()
        ];
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}

if ($method === 'POST') {
    $nom = trim($_POST['nom'] ?? '');

    if ($nom === '') {
        echo json_encode([
            'success' => false,
            'message' => 'Nom obligatoire'
        ]);
        exit;
    }

    // Simulation du chargement pour tester le bouton
    sleep(2);

    $resultat = $gestion->ajouterCategorie($nom);

    if ($resultat) {
        echo json_encode([
            'success' => true,
            'message' => 'Catégorie ajoutée avec succès'
        ]);
    } else {
        http_response_code(500);

        echo json_encode([
            'success' => false,
            'message' => 'Erreur lors de l\'enregistrement'
        ]);
    }

    exit;
}

http_response_code(405);

echo json_encode([
    'success' => false,
    'message' => 'Méthode non autorisée'
]);