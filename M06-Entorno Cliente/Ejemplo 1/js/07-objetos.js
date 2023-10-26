//crea un objeto
let user = {
    name: "sofia",
    age: 23,
}

//sobreescrivir una propiedad de la classe
user.name="Pol";

console.log(user);

//objeto a cadena
console.log(JSON.stringify(user)); // ponemos comillas a las variables

//cadena a objeto
let user=JSON.parse(user);
console.log(user);

// Parse
let numbers = ["0 , 1, 2, 3"]
console.log(numbers); //antes del parse
numbers=JSON.parse(numbers);
console.log(numbers); //desoues del parse
