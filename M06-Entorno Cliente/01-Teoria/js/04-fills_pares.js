


//cojemos el primer elemento i el ultimo
console.log(document.getElementById("mycities").firstElementChild);
console.log(document.getElementById("mycities").lastElementChild.value);

//pare del select
console.log(document.getElementById("mycities").parentNode);
console.log(document.getElementById("mycities").parentElement);

//esborrar un node
document.getElementById("mycities").remove();

//crear un node
document.getElementById("mycities");