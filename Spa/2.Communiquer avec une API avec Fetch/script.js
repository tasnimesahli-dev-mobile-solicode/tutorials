const API_URL = "backend/api.php";
let ligneEnEdition = null;

const tableBody = document.getElementById("tableBody");
const formCategorie = document.getElementById("categoryForm");
const champNom = document.getElementById("nom");
const champCouleur = document.getElementById("couleur");
const champIcone = document.getElementById("icone");

function chargerCategories() {
    fetch(API_URL)
        .then(res => res.json())
        .then(result => {
            tableBody.innerHTML = "";

            result.data.forEach(cat => {
                const tr = document.createElement("tr");

                tr.innerHTML = `
                    <td>${cat.id}</td>
                    <td>${cat.nom}</td>
                    <td>${cat.couleur}</td>
                    <td>${cat.icone}</td>
                    <td>
                        <button class="btn-modifier">Modifier</button>
                        <button class="btn-supprimer">Supprimer</button>
                    </td>
                `;

                tr.querySelector(".btn-modifier").addEventListener("click", () => {
                    champNom.value = cat.nom;
                    champCouleur.value = cat.couleur;
                    champIcone.value = cat.icone;
                    ligneEnEdition = cat.id;
                });

                tr.querySelector(".btn-supprimer").addEventListener("click", () => {
                    fetch(API_URL, {
                        method: "DELETE",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({ id: cat.id })
                    })
                    .then(res => res.json())
                    .then(() => chargerCategories());
                });

                tableBody.appendChild(tr);
            });
        });
}

formCategorie.addEventListener("submit", (e) => {
    e.preventDefault();

    const categorie = {
        nom: champNom.value,
        couleur: champCouleur.value,
        icone: champIcone.value
    };

    let methode = "POST";

    if (ligneEnEdition !== null) {
        methode = "PUT";
        categorie.id = ligneEnEdition;
    }

    fetch(API_URL, {
        method: methode,
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(categorie)
    })
    .then(res => res.json())
    .then(() => {
        formCategorie.reset();
        ligneEnEdition = null;
        chargerCategories();
    });
});

const btnAjouter = document.getElementById("btnAjouter");
const btnAnnuler = document.getElementById("btnAnnuler");

btnAjouter.addEventListener("click", () => {
    formCategorie.style.display = "block";
});

btnAnnuler.addEventListener("click", () => {
    formCategorie.reset();
    formCategorie.style.display = "none";
    ligneEnEdition = null;
});

chargerCategories();