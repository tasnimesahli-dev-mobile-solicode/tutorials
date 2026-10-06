const API_PATH='../../backend/api.php';
const nom=document.getElementById('nom');
const description=document.getElementById('description');
const form=document.getElementById('form');
const annuler=document.getElementById('Annuler');
const ajouter=document.getElementById('ajouter');
const tbody=document.getElementById('body');
function chargerCategories() {
    fetch(API_PATH) 
    .then(response=>response.json())
    .then(categories=>{
        tbody.innerHTML="";
        categories.forEach(categorie => {
        const tr=document.createElement('tr');
        tr.innerHTML= `
        <td>${categorie.id}</td>
        <td>${categorie.nom}</td>
         <td>${categorie.description}</td>
<button type="button" class="supprimer" data-id="${categorie.id}">Supprimer</button>` 
        tbody.appendChild(tr);
        });
        const btnsupp=document.querySelectorAll(".supprimer");
        btnsupp.forEach(btn =>{
        btn.addEventListener('click' , ()=>{
            const id=btn.dataset.id;
        fetch(API_PATH, {
            method:'DELETE',
            headers:{'Content-Type':'application/json'},
            body:JSON.stringify({
                id:id
            })
        })
        })
            
        });         
        })
    .catch(error=>console.log(error))
}
chargerCategories();
    form.addEventListener("submit" , (e)=>{
     e.preventDefault();
      fetch(API_PATH , {
        method:'POST',
        headers:{'Content-Type':'application/json'},
        body: JSON.stringify({
                nom:nom.value,
                description:description.value
        })  
    })
    .then(response=>response.json())
    .then(categories=>chargerCategories())
    .catch(error=>console.log(error))
    })
