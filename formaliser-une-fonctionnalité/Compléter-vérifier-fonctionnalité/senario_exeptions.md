**Scénario d’erreur :**

Condition (Erreur) : À l’étape 9, l’Auteur ne saisit aucun contenu.

L’Auteur clique sur « Enregistrer l’article ».
Le système refuse l’enregistrement et affiche le message « Le contenu de l’article est obligatoire ».
Reprise : L’Auteur remplit le champ contenu et le scénario reprend à l’étape 7.

**Scénario alternatif :**

Condition (Alternatif) : À l’étape 5, l’Auteur sélectionne le statut « Brouillon » au lieu de « Publié ».

L’Auteur clique sur « Enregistrer l’article ».
Le système sauvegarde l’article dans la base de données avec le statut inactif (brouillon).
Le système redirige l’Auteur vers la liste des articles.
Fin du scénario : L’article est enregistré, mais non visible par les visiteurs du site.