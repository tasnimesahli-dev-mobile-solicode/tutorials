//valeur maximale 
let array=[50,2,100,350,5];

let vMax=array[0];

for(let i=0;i<array.length ;i++){
    if(array[i]>vMax){
        vMax=array[i];
    }
}
console.log("La valeur maximale est : " + vMax);
