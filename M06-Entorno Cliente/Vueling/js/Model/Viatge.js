class Viatge {

    //atributs
    #origen; // # : privado
    #destino; // # : privado
    #data_ida; // # : privado
    #data_vuelta; // # : privado
    #precio;  // # : privado
    #pasajeros;  // # : privado

    //constructor (en JavaSript solo se puede poner uno)
    constructor(origen, destino, data_ida, data_vuelta, precio=0, pasajeros=0) { // si solo nos da el nombre por defecto nos pondra de contraseña 1234 i asi con esto es como si tuvieramos 2 constructores
        this.#origen = origen;
        this.#destino = destino;
        this.#data_ida = data_ida;
        this.#data_vuelta = data_vuelta;
        this.#precio = precio;
        this.#pasajeros = pasajeros;
    }

    //Setter i Getters
    set origen(value) {
        this.#origen = value;
    }

    get origen() {
        return this.#origen;
    }

    set destino(value) {
        this.#destino = value;
    }

    get destino() {
        return this.#destino;
    }

    set data_ida(value) {
        this.data_ida = value;
    }

    get data_ida() {
        return this.#data_ida;
    }

    set data_vuelta(value) {
        this.data_vuelta = value;
    }

    get data_vuelta() {
        return this.#data_vuelta;
    }

    set precio(value) {
        this.precio = value;
    }

    get precio() {
        return this.#precio;
    }

    set pasajeros(value) {
        this.pasajeros = value;
    }

    get pasajeros() {
        return this.#pasajeros;
    }

    //metodos
    printing_ida() {
        return "El origen del vuelo es: " + this.#origen + ", el destino: " + this.#destino + ", el dia de ida programado de ida es: " + this.#data_ida + ", tiene: " + this.#pasajeros + " pasajeros, y tiene un precio de: " + this.#precio;
    }

    printing_ida_vuelta() {
        return "El origen del vuelo es: " + this.#origen + ", el destino: " + this.#destino + ", el dia de ida programado de ida es: " + this.#data_ida + ", tiene: " + this.#pasajeros + ", y de vuelta: " + this.#data_vuelta + ", y tiene un precio de: " + this.#precio;
    }

}