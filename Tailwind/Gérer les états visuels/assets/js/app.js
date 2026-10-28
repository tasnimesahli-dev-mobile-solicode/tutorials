
const form = document.getElementById('form');
const btnSubmit = document.getElementById('btnSubmit');
const spinner = document.getElementById('spinner');
const btnText = document.getElementById('btnText');

const api = 'api/controllers/CategorieController.php';

// 1. Gérer le chargement
function setLoadingState(isLoading) {
    btnSubmit.disabled = isLoading;

    if (isLoading) {
        spinner.classList.remove('hidden');
        btnText.textContent = 'Enregistrement...';
    } else {
        spinner.classList.add('hidden');
        btnText.textContent = 'Ajouter';
    }
}

// 2. Afficher les Toasts
function showToast(message, type = 'success') {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');

    let classes = 'text-white px-4 py-2 rounded shadow-lg transition-opacity duration-300';

    if (type === 'success') {
        classes += ' bg-green-500';
    } else {
        classes += ' bg-red-500';
    }

    toast.className = classes;
    toast.textContent = message;

    container.appendChild(toast);

    setTimeout(() => {
        toast.style.opacity = '0';

        setTimeout(() => {
            toast.remove();
        }, 300);
    }, 3000);
}

// 3. Ajouter une catégorie
form.addEventListener('submit', (e) => {
    e.preventDefault();

    setLoadingState(true);

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
            showToast(data.message || 'Catégorie enregistrée avec succès !', 'success');
            form.reset();
        } else {
            showToast(data.message || "Erreur lors de l'enregistrement", 'error');
        }
    })
    .catch(error => {
        showToast('Erreur : ' + error.message, 'error');
        console.error(error);
    })
    .finally(() => {
        setLoadingState(false);
    });
});
