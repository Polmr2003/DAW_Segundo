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

// Ruta POST para el login de los usuarios
// establecemos una ruta POST en la aplicación Express. La ruta es '/vueling/login', lo que significa que manejará solicitudes POST enviadas a esa URL específica.
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
            }

            // mostramos el resultado (La informacion del usuario) si no a habido error en la consulta
            console.log("Resultados de la consulta:", results);

            // Verificar si se encontró una coincidencia
            if (results.length === 1) {
                // Credenciales válidas, a encontrado el usuario
                // Enviamos una respuesta con un código de estado 200 (OK) y un objeto JSON con:
                // un booleno de error a false, un array de resultats con los resultados i enviamos un mensage con el string "Autenticación exitosa"
                res.status(200).json({
                    error: false,
                    resultats: results,
                    message: "Autenticación exitosa"
                });
            } else {
                // Si no a encontrado ningin usuario
                // Enviamos una respuesta con un código de estado 401 ( No a encontrado el usuario o "Unauthorized" (No autorizado)) y un objeto JSON con:
                // un booleno de error a true, un array de resultats a null i enviamos un mensage con el string "Credenciales incorrectas"
                res.status(401).json({
                    error: true,
                    resultats: null,
                    message: "Credenciales incorrectas"
                });
            }
        });
});

// Ruta POST para el registro de los usuarios
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
                // mostramos por consola el error
                console.error('Error en la inserción de usuario:', error.message);

                // Credenciales inválidas
                // Enviamos una respuesta con un código de estado 400 ("Bad Request" (Solicitud incorrecta)) y un objeto JSON con:
                // un booleno de error a true, un array de resultats a null i enviamos un mensage con el string "Error en la inserción de usuario"
                res.status(400).json({
                    error: true,
                    resultats: null,
                    message: "Error en la inserción de usuario"
                });
            } else {
                // Credenciales válidas
                // Enviamos una respuesta con un código de estado 200 (OK) y un objeto JSON con:
                // un booleno de error a false, un array de resultats con los resultados i enviamos un mensage con el string "Usuario insertado con éxito"
                res.status(200).json({
                    error: false,
                    resultats: results,
                    message: "Usuario insertado con éxito"
                });
            }
        }
    );
});

// Ruta GET para recojer las ciudades de los vuelos en la base de datos
// establecemos una ruta GET en la aplicación Express. La ruta es '/vueling/ciudades', lo que significa que manejará solicitudes GET enviadas a esa URL específica.
app.get('/vueling/ciudades', (req, res) => {
    // api.get....(api/:username)
    // const usuario= req.params.username;
    
    // Realiza una consulta SQL para obtener las ciudades desde la base de datos
    connection.query('SELECT name FROM ciudades', function (error, results) {
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
            // Creamos un nuevo array para almacenar solo los nombres de las ciudades, si no nos pasara un array de objetos con los nombres de las ciudades
            const ciudades = results.map(ciudad => ciudad.name);

            // Envia la lista de ciudades como respuesta con un código de estado 200 (OK) y un objeto JSON con:
            // un booleno de error a false, un array de resultats con el array de todas ciudades i enviamos un mensage con el string "Ciudades recojidas de la base de datos"
            res.status(200).json({
                error: false,
                resultats: ciudades,
                message: "Ciudades recojidas de la base de datos"
            });

        }
    });
});

app.listen(3000, () => {
    console.log("Aquesta és la nostra web node express pel port 3000!!");
})