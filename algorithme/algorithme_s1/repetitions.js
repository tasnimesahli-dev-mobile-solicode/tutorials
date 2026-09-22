let nombres = [4, 7, 2, 7, 9, 4, 5];
let tab=[];
for(let i=0 ; i<nombres.length ; i++){
    let computer=0;
    for(let j=0 ; j<nombres.length ; j++){
        if(nombres[i]==nombres[j] && i!==j){
        computer++;
        }}
    if(computer>=1){
        let existe=false;
       for(let o=0 ; o<tab.length ; o++){
        if(tab[o]===nombres[i]){
            existe=true;
        }}
       if(existe==false){
        tab.push(nombres[i]);
       }}}
console.log(tab);