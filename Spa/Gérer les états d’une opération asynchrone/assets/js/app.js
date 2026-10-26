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

form.addEventListener('submit', (e) => {
    e.preventDefault();

    setLoadingState(true);
    message.textContent = '';

    fetch(api, {
        method: 'POST',
        body: new FormData(form)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erreur HTTP : ' + response.status);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            message.textContent = data.message;
            message.style.color = 'green';
            form.reset();
        } else {
            message.textContent = data.message;
            message.style.color = 'red';
        }
    })
    .catch(error => {
        message.textContent = 'Erreur : ' + error.message;
        message.style.color = 'red';
        console.error(error);
    })
    .finally(() => {
        setLoadingState(false);
    });
});