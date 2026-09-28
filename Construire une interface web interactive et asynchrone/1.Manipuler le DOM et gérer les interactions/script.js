document.addEventListener('DOMContentLoaded', () => {

    const btnShowForm = document.querySelector('#btn-show-form');
    const sectionForm = document.querySelector('#section-form');
    const btnCancelForm = document.querySelector('#btn-cancel-form');

    const formCategorie = document.querySelector('#form-categorie');
    const catNom = document.querySelector('#cat-nom');
    const catCouleur = document.querySelector('#cat-couleur');
    const tableCategoriesBody = document.querySelector('#table-categories-body');


    btnShowForm.addEventListener('click', () => {
        btnShowForm.hidden = true;
        sectionForm.hidden = false;
    });


    btnCancelForm.addEventListener('click', () => {
        btnShowForm.hidden = false;
        sectionForm.hidden = true;
        formCategorie.reset();
    });


    formCategorie.addEventListener('submit', (event) => {

        event.preventDefault();

        const nom = catNom.value;
        const couleur = catCouleur.value;

        tableCategoriesBody.insertAdjacentHTML(
            'beforeend',
            `
            <tr>
                <td>${nom}</td>
                <td>${couleur}</td>
            </tr>
            `
        );

        formCategorie.reset();
        sectionForm.hidden = true;
        btnShowForm.hidden = false;
    });

});