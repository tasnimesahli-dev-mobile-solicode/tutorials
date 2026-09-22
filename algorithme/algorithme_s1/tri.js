let array = [8, 3, 6, 1, 5];
for(let i = 0 ; i<array.length ; i++) {
    for (let j=i+1 ; j<array.length ; j++) {
        let temporaire;
        if(array[i]>array[j]){
    temporaire=array[i];
    array[i]=array[j];
    array[j]=temporaire
        }
    }
}
console.log(array);