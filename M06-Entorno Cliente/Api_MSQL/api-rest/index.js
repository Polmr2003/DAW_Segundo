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

// post para el recurso hello
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

// Ruta GET para autenticación
// establecemos una ruta post en la aplicación Express. La ruta es '/vueling/login', lo que significa que manejará solicitudes GET enviadas a esa URL específica.
app.post('/vueling/login', (req, res) => {
    // extraemos las propiedades usuari y password del cuerpo de la solicitud (req.body). Estos valores se envían desde el cliente como parte de la solicitud POST
    const { usuari, password } = req.body;

    // comprovamos lo que nos a llegado al servidor
    console.log("Usuario recibido en el servidor:", usuari);
    console.log("Contraseña recibida en el servidor:", password);

    /// Realiza una consulta SQL para consultar la base de datos si existe el usuario i la contraseña en la tabla 'users'
    connection.query(
        'SELECT * FROM users WHERE usuari = ? AND password = ?',
        [usuari, password],
        function (error, results) {
            // Manejo de errores
            if (error) {
                console.error('Error en la consulta de autenticación: ' + error.message);
                return res.status(500).send({ error: true, message: 'Error en la autenticación' });
            }

            console.log("Resultados de la consulta:", results);

            // Verificar si se encontró una coincidencia
            if (results.length === 1) {
                // Credenciales válidas
                res.status(200).json({ success: true, message: 'Autenticación exitosa' });
            } else {
                // Credenciales inválidas
                res.status(401).json({ success: false, message: 'Credenciales incorrectas' });
            }
        });
});

// Ruta POST para la inserción de usuarios
// establecemos una ruta POST en la aplicación Express. La ruta es '/vueling/register', lo que significa que manejará solicitudes POST enviadas a esa URL específica.
app.post('/vueling/register', function (req, res) {
    // extraemos las propiedades nom, cognom, gmail, password, y usuari del cuerpo de la solicitud (req.body). Estos valores se envían desde el cliente como parte de la solicitud POST
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