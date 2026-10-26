<?php

require_once __DIR__ . '/Categorie.php';

class GestionCategorie {
    private $dataFile = __DIR__ . '/../data/data.json';

    public function getAll(): array {
        if (!file_exists($this->dataFile)) {
            return [];
        }

        $data = json_decode(
            file_get_contents($this->dataFile),
            true
        );

        $categories = [];

        foreach ($data ?? [] as $row) {
            $categories[] = new Categorie(
                $row['id'],
                $row['nom'],
                $row['couleur'],
                $row['icone']
            );
        }

        return $categories;
    }
}