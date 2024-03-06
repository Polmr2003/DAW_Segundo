// /**
//  * Script per a validar, crera token i llegir per a tots els usuaris
//  * validats, només els de rol admin poden afegir llibres
//  * Mira: https://stackabuse.com/authentication-and-authorization-with-jwts-in-express-js/
//  * 
//  */

//carrega del framework express
const express = require('express');
const app = express();

//carrega del paquet jsonwebtoken
//tenemos que instalarlo con: npm i --save body-parser jsonwebtoken
const jwt = require('jsonwebtoken');

//carrega del body-parser per a recollir el que ens vindrà
//del frontend
const bodyParser = require('body-parser');
app.use(bodyParser.json());

//paraula secreta necessària en el token
const accessTokenSecret = 'youraccesstokensecret';

//usuaris  fixos per a fer la prova. 
// const users = [
//     {
//         username: 'john',
//         password: 'password123admin',
//         role: 'admin'
//     }, {
//         username: 'anna',
//         password: 'password123member',
//         role: 'member'
//     }
// ];

////// COMPTE: hem d'instal·lar mysql per a Node Express amb npm i -S mysql

////// declarem els paràmetres de connexió
var connection = mysql.createConnection({
    host: 'localhost',
    database: 'Zoo',
    user: 'root',
    password: ''
});

//creemos una constant que hara de middleware a quien la haga servir
const authenticateJWT = (req, res, next) => {
    // cojemos el atributo authorization de la request(req) que contiene la información de autenticación
    const authHeader = req.headers.authorization;

    // verificamos si existe un encabezado de autorización en la solicitud HTTP 
    if (authHeader) {
        // dividimos el encabezado de autorización para extraer el token
        const token = authHeader.split(' ')[1]; // [índice 1] contiene el token de autenticación real

        // verificamos la validez del token de autenticación utilizando una función proporcionada por una biblioteca de JWT
        jwt.verify(token, accessTokenSecret, (err, user) => {
            // comprobamos los errores
            if (err) {
                // si a habido un error
                // mostramos por console el error
                console.error('Error: ' + err.stack);

                // retornamos una respuesta con un código de estado 403(Forbidden) 
                return res.sendStatus(403);
            } else {
                // si no a habido un error
                // recojemos los datos, La propiedad user(req.user) se utiliza para almacenar los datos del usuario autenticado
                // i user es el objeto que contiene los datos del usuario autenticado
                req.user = user;

                // pasamos el control al siguiente middleware en la cadena(La funcion con el CRUD)
                next();
            }

        });
    } else {
        // si no existe un encabezado de autorizacion mandaremos una respuesta con un mensaje de error
        res.json({ error: true, data: "Permís denegat al servidor" });
    }
};

//atenem la petició de login
app.post('/login', (req, res) => {
    //res.sendFile(process.cwd()+"/view/index.html"); //angular dins del servidor
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
                // generem un token
                const accessToken = jwt.sign({ username: user.username, role: user.role }, accessTokenSecret);

                // Enviamos una respuesta con un código de estado 200 (OK) y un objeto JSON con:
                // un booleno de error a false, un array de resultats con los resultados i enviamos un mensage satisfactorio
                //enviem el token
                res.status(200).json({
                    error: false,
                    results: results,
                    token: accessToken,
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

//creem un array de llibres
const books = [
    {
        "author": "Chinua Achebe",
        "country": "Nigeria",
        "language": "English",
        "pages": 209,
        "title": "Things Fall Apart",
        "year": 1958
    },
    {
        "author": "Hans Christian Andersen",
        "country": "Denmark",
        "language": "Danish",
        "pages": 784,
        "title": "Fairy tales",
        "year": 1836
    },
    {
        "author": "Dante Alighieri",
        "country": "Italy",
        "language": "Italian",
        "pages": 928,
        "title": "The Divine Comedy",
        "year": 1315
    },
];


//get de books: si passa el control del middleware hi entrarà 
//i enviarà tots els llibres
app.get('/books', authenticateJWT, (req, res) => {
    res.json(books);
});

//post de books: si passa el control del middleware hi entrarà 
//i comprovarà el rol. Només si som admin ens deixa afegir un llibre

app.post('/books', authenticateJWT, (req, res) => {
    //recollim el rol del user autenticat
    const role = req.user.role;

    if (role !== 'admin') {
        return res.sendStatus(403);
    }
    const book = req.body
    books.push(book);
    res.send('Book added successfully');

});

app.listen(3000, () => {
    console.log('Authentication service started on port 3000');
});