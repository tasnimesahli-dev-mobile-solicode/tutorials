const ul=document.getElementById('ul');
const api='../backend/categories.php';
fetch(api)
.then(response=>response.json())
.then(categories=>{
    categories.forEach(categorie => {
        const li=document.createElement('li');
        li.innerText=categorie.nom;
        ul.appendChild(li);
    });
})
.catch(error=>console.log(error));