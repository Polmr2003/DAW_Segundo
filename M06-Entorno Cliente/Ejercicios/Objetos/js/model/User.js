class User {

    //atributs
    #username; // # : privado
    #password;
    email; // publico

    //constructor (en JavaSript solo se puede poner uno)
    constructor(nom, contraseña="1234") { // si solo nos da el nombre por defecto nos pondra de contraseña 1234 i asi con esto es como si tuvieramos 2 constructores
        this.#username = nom;
        this.#password = contraseña;
    }

    //Setter i Getters
    set username(value){
        this.#username=value;
    }

    get username(){
        return this.#username;
    }

    set password(value){
        this.#password=value;
    }

    get password(){
        return this.#password;
    }

    set email(value){
        this.email=value;
    }

    get email(){
        return this.email;
    }

    //metodos
    printing(){
        return "El teu nom es: " + this.#username + ", i tens de password: " + this.#password;
    }
}