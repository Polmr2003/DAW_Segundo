'use strict';
//importaciones
const express = require('express');//importo el paquete
const bodyParser = require('body-parser');
const mysql = require('mysql');
const cors = require('cors');

//uso
const app = express();//llamo para ser usado el paquete
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

//DEJO ENTRAR A LAS RUTAS DESDE FUERA, EVITO ERROR CORS
app.use(cors())

//get para el recurso hola
app.get('/hola', (req, res) => {
    res.send({ message: "Hola món des de /hola" })
})

app.post('/hello', (req, res) => {
    res.send({ message: "Hola món des de /hello" })
})

app.get('/', (req, res) => {
    res.send({ message: "Estic al meu servidor node express" })
})

////// AIXÒ ÉS NOU I SERIA PER TREBALLAR AMB MYSQL
////// COMPTE: hem d'instal·lar mysql per a Node Express amb npm i -S mysql
////// importem mysql

////// declarem els paràmetres de connexió (millor si l’usuari de connexió no és root sinó un usuari específic per aquesta BBDD
////// i amb permissos restringits
var connection = mysql.createConnection({
    host: 'localhost',
    database: 'Usuarios',
    user: 'root',
    password: ''
});
/////// fem servir la BBDD que tenim
app.post('/vueling/login', function (req, res) {
    // Desestructura los datos del cuerpo de la solicitud (request)
    const { nom, cognom, gmail, password, usuari } = req.body;

    // Realiza una consulta SQL para insertar un nuevo usuario en la tabla 'users'
    connection.query(
        'INSERT INTO users (nom, cognom, gmail, password, usuari) VALUES (?, ?, ?, ? ,?)',
        [nom, cognom, gmail, password, usuari],
        function (error, results) {
            // Manejo de errores
            if (error) {
                console.error('Error en la inserción de usuario:', error);

                // Envía una respuesta con un código de estado 400 (Bad Request) y un objeto JSON indicando el error
                res.status(400).send({
                    error: true,
                    resultats: null,
                    mensaje: "Error en la inserción de usuario"
                });
            } else {
                // Envía una respuesta con un código de estado 200 (OK) y un objeto JSON indicando el éxito
                res.status(200).send({
                    error: false,
                    resultats: results,
                    mensaje: "Usuario insertado con éxito"
                });
            }
        }
    );
});

app.listen(3000, () => {
    console.log("Aquesta és la nostra web node express pel port 3000!!");
})