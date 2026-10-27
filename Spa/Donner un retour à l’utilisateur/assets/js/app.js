const form = document.getElementById('form');
const btnSubmit = document.getElementById('btnSubmit');
const message = document.getElementById('message');

const api = 'api/controllers/CategorieController.php';

function setLoadingState(isLoading) {
    if (isLoading) {
        btnSubmit.disabled = true;
        btnSubmit.textContent = 'Enregistrement...';
    } else {
        btnSubmit.disabled = false;
        btnSubmit.textContent = 'Ajouter';
    }
}
function showToast(message, type = 'success'){
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');

    toast.className = `toast toast-${type}`;
    toast.textContent = message;

    container.appendChild(toast);

    setTimeout(() => {
        toast.remove();
    }, 3000);
}

form.addEventListener('submit', (e) => {
    e.preventDefault();

    setLoadingState(true);
    message.textContent = '';

    fetch(api, {
        method: 'POST',
        body: new FormData(form)
    })
    .then(response => response.json())
    .then(data => {
        showToast("Catégorie enregistrée avec succès !", "success");
           form.reset();
    })
    .catch(error => {
        showToast("Erreur réseau : Impossible de contacter le serveur.", "error");
        console.error(error);
    })
    .finally(() => {
        setLoadingState(false);
    });

});