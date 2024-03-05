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
    database: 'Zoo',
    user: 'root',
    password: ''
});


/////// fem servir la BBDD que tenim

// Ruta POST para el login de los usuarios

// Ruta POST para el registro de los usuarios
// establecemos una ruta POST en la aplicación Express. La ruta es '/vueling/register', lo que significa que manejará solicitudes POST enviadas a esa URL específica.
app.post('/zoo/register', function (req, res) {
    // extraemos las propiedades nom, cognom, gmail, password, y usuari del cuerpo de la solicitud (req.body). Estos valores se envían desde el cliente como parte de la solicitud POST
    const {especie, sexe, any_naixement, pais, continent } = req.body;

    // Realiza una consulta SQL para insertar un nuevo usuario en la tabla 'users'
    connection.query(
        'INSERT INTO animals (especie, sexe, any_naixement, pais, continent) VALUES (?, ?, ?, ? ,?)',
        [especie, sexe, any_naixement, pais, continent],
        function (error, results) {
            // Manejo de errores
            if (error) {
                // mostramos por consola el error
                console.error('Error en la inserción de usuario:', error.message);

                // Credenciales inválidas
                // Enviamos una respuesta con un código de estado 400 ("Bad Request" (Solicitud incorrecta)) y un objeto JSON con:
                // un booleno de error a true, un array de resultats a null i enviamos un mensage con el string "Error en la inserción de usuario"
                res.status(400).json({
                    error: true,
                    resultats: null,
                    message: "Error en la inserción de el animal"
                });
            } else {
                // Credenciales válidas
                // Enviamos una respuesta con un código de estado 200 (OK) y un objeto JSON con:
                // un booleno de error a false, un array de resultats con los resultados i enviamos un mensage con el string "Usuario insertado con éxito"
                res.status(200).json({
                    error: false,
                    resultats: results,
                    message: "Animal insertado con éxito"
                });
            }
        }
    );
});

// Ruta GET para recojer las ciudades de los vuelos en la base de datos
// establecemos una ruta GET en la aplicación Express. La ruta es '/vueling/ciudades', lo que significa que manejará solicitudes GET enviadas a esa URL específica.
app.get('/zoo/listar', (req, res) => {

    // Realiza una consulta SQL para obtener las ciudades desde la base de datos
    connection.query('SELECT * FROM animals', function (error, results) {
        // Manejo de errores
        if (error) {
            // mostramos por consola el error
            console.error('Error en la consulta de autenticación:', error.message);

            // Si hay un error
            // Enviamos una respuesta con un código de estado 500 ("Internal Server Error" (Error interno del servidor)) y un objeto JSON con:
            // un booleno de error a true, un array de resultats a null i enviamos un mensage con el string "Error en la autenticación"
            res.status(500).json({
                error: true,
                resultats: null,
                message: "Error en la autenticación"
            });
        } else {
            
            let id = results.map(results => results.id);
            let especie = results.map(results => results.especie);
            let sexe = results.map(results => results.sexe);
            let any_naicement = results.map(results => results.any_naixement);
            let pais = results.map(results => results.pais);
            let continent = results.map(results => results.continent);

            // Envia la lista de cudades como respuesta con un código de estado 200 (OK) y un objeto JSON con:
            // un booleno de error a false, un array de resultats con el array de todas ciudades i enviamos un mensage con el string "Ciudades recojidas de la base de datos"
            res.status(200).json({
                error: false,
                id: id,
                especie:especie,
                sexe:sexe,
                any_naicement:any_naicement,
                pais:pais,
                continent:continent,
                message: "Ciudades recojidas de la base de datos"
            });

        }
    });
});

app.listen(3001, () => {
    console.log("Aquesta és la nostra web node express pel port 3000!!");
})