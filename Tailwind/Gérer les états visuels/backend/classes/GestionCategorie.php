<?php

require_once __DIR__ . '/Categorie.php';

class GestionCategorie {
    private $dataFile = __DIR__ . '/../data/categories.json';

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
                $row['nom']
            );
        }

        return $categories;
    }

    public function ajouterCategorie($nom): bool {
        $categories = $this->getAll();

        $data = [];
        $maxId = 0;

        foreach ($categories as $categorie) {
            $data[] = [
                'id' => $categorie->getId(),
                'nom' => $categorie->getNom()
            ];

            $maxId = max($maxId, $categorie->getId());
        }

        $data[] = [
            'id' => $maxId + 1,
            'nom' => $nom
        ];

        return file_put_contents(
            $this->dataFile,
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
            LOCK_EX
        ) !== false;
    }
}