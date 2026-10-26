<?php

require_once __DIR__ . '/../../backend/classes/GestionCategorie.php';

class CategorieController {

    public function listerCategories(): void {

        $gestion = new GestionCategorie();
        $categories = $gestion->getAll();

        $data = [];

        foreach ($categories as $cat) {
            $data[] = [
                'id' => $cat->getId(),
                'nom' => $cat->getNom(),
                'couleur' => $cat->getCouleur(),
                'icone' => $cat->getIcone()
            ];
        }

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}

$controller = new CategorieController();
$controller->listerCategories();