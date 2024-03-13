'use strict';
//importaciones
const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');
const cors = require('cors');

//uso
const app = express();//llamo para ser usado el paquete
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

//DEJO ENTRAR A LAS RUTAS DESDE FUERA, EVITO ERROR CORS
app.use(cors())


////// COMPTE: hem d'instal·lar mysql per a Node Express amb npm i -S mysql

////// declarem els paràmetres de connexió
var connection = mysql.createConnection({
    host: 'localhost',
    database: 'Zoo',
    user: 'root',
    password: ''
});

// Ruta POST para el login de los usuarios
// establecemos una ruta POST en la aplicación Express. La ruta es '/vueling/login', lo que significa que manejará solicitudes POST enviadas a esa URL específica.
app.post('/login', (req, res) => {
    // api.get....(api/:username)
    // extraemos los valores del cuerpo de la solicitud (req.body). Estos valores se envían desde el cliente como parte de la solicitud POST
    const { usuari, password } = req.body;

    // comprovamos lo que nos a llegado al servidor
    // console.log("Usuario recibido en el servidor:", usuari);
    // console.log("Contraseña recibida en el servidor:", password);

    /// Realiza una consulta SQL para consultar la base de datos si existe el usuario i la contraseña
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
                // un booleno de error a true, un array de resultats a null i enviamos un mensage de error
                res.status(500).json({
                    error: true,
                    results: null,
                    message: "Error en la autenticación"
                });
            }

            // mostramos el resultado (La informacion del usuario) si no a habido error en la consulta
            console.log("Resultados de la consulta:", results);

            // Verificar si se encontró una coincidencia
            if (results.length === 1) {
                // Si no a habido ningun error, a encontrado el usuario
                // Enviamos una respuesta con un código de estado 200 (OK) y un objeto JSON con:
                // un booleno de error a false, un array de resultats con los resultados i enviamos un mensage satisfactorio
                res.status(200).json({
                    error: false,
                    results: results,
                    message: "Autenticación exitosa"
                });
            } else {
                // Si no a encontrado ningin usuario
                // Enviamos una respuesta con un código de estado 401 ( No a encontrado el usuario o "Unauthorized" (No autorizado)) y un objeto JSON con:
                // un booleno de error a true, un array de resultats a null i enviamos un mensage de error
                res.status(401).json({
                    error: true,
                    results: null,
                    message: "Credenciales incorrectas"
                });
            }
        });
});

// Ruta POST para el registro de los usuarios
// establecemos una ruta POST en la aplicación Express. La ruta es '/vueling/register', lo que significa que manejará solicitudes POST enviadas a esa URL específica.
app.post('/register', function (req, res) {
    // extraemos los valores del cuerpo de la solicitud (req.body). Estos valores se envían desde el cliente como parte de la solicitud POST
    const {especie, sexe, any_naixement, pais, continent } = req.body;

    // Realiza una consulta SQL para insertar nuevos datos en la base de datos
    connection.query(
        'INSERT INTO animals (especie, sexe, any_naixement, pais, continent) VALUES (?, ?, ?, ? ,?)',
        [especie, sexe, any_naixement, pais, continent],
        function (error, results) {
            // Manejo de errores
            if (error) {
                // mostramos por consola el error
                console.error('Error en la inserción en la base de datos:', error.message);

                // Si a habido un error en la consulta
                // Enviamos una respuesta con un código de estado 400 ("Bad Request" (Solicitud incorrecta)) y un objeto JSON con:
                // un booleno de error a true, un array de resultats a null i enviamos un mensage de error
                res.status(400).json({
                    error: true,
                    results: null,
                    message: "Error en la inserción en la base de datos"
                });
            } else {
                // Si no a habido ningun error
                // Enviamos una respuesta con un código de estado 200 (OK) y un objeto JSON con:
                // un booleno de error a false, un array de resultats con los resultados i enviamos un mensage satisfactorio
                res.status(200).json({
                    error: false,
                    results: results,
                    message: "Datos insertados correctamente"
                });
            }
        }
    );
});

// Ruta GET para recojer las ciudades de los vuelos en la base de datos
// establecemos una ruta GET en la aplicación Express. La ruta es '/vueling/ciudades', lo que significa que manejará solicitudes GET enviadas a esa URL específica.
app.get('/listar', (req, res) => {

    // Realiza una consulta SQL para obtener las ciudades desde la base de datos
    connection.query('SELECT * FROM animals', function (error, results) {
        // Manejo de errores
        if (error) {
            // mostramos por consola el error
            console.error('Error en la consulta de autenticación:', error.message);

            // Si a habido un error en la consulta
            // Enviamos una respuesta con un código de estado 500 ("Internal Server Error" (Error interno del servidor)) y un objeto JSON con:
            // un booleno de error a true, un array de resultats a null i enviamos un mensage de error
            res.status(500).json({
                error: true,
                results: null,
                message: "Error en la autenticación"
            });
        } else {

            //let id = results.map(results => results.id);
            //let id=results[0].id;
            
            // Si no a habido ningun error
            // Enviamos una respuesta con un código de estado 200 (OK) y un objeto JSON con:
            // un booleno de error a false, un array de resultats con el array de todas ciudades i enviamos un mensage satisfactorio
            res.status(200).json({
                error: false,
                //id: id,
                results:results,
                message: "Datos recojidos correctamente"
            });

        }
    });
});

app.put('/update/:id', function (req, res) {
    const { id } = req.params;
    const { nombre, descripcion, fecha, hora, creado_por } = req.body;

    const sql = 'UPDATE events SET nombre = ?, descripcion = ?, fecha = ?, hora = ?, creado_por = ? WHERE id = ?';

    connection.query(sql, [nombre, descripcion, fecha, hora, creado_por, id], function (error, results) {
        if (error) {
            console.error('Error al actualizar el evento:', error.message);
            res.status(400).json({
                error: true,
                message: "Error al actualizar el evento"
            });
        } else {
            res.status(200).json({
                error: false,
                results: results,
                message: "Evento actualizado correctamente"
            });
        }
    });
});

app.listen(3001, () => {
    console.log("Aquesta és la nostra web node express pel port 3000!!");
})