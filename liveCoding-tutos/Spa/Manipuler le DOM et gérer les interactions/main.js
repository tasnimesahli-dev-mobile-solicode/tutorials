const form=document.getElementById('form');
const ajouter=document.getElementById('button');
const tbody=document.getElementById('tbody');

ajouter.addEventListener('click' , ()=>{
    form.hidden=false;
    ajouter.hidden=true;
})
form.addEventListener("submit",(e)=>{
    e.preventDefault();
    const nom=document.getElementById('name').value;
    const tr=document.createElement('tr');
    tr.innerHTML=`<td>${nom}</td>`
    tbody.appendChild(tr);
     form.reset();
    form.hidden=true;
    ajouter.hidden=false;

})
