|--------------------------------------------------------------------------
| Jwt
|--------------------------------------------------------------------------

1.Instalamos el paquete: npm i --save body-parser jsonwebtoken

2.Llamamos al paquete en el principio de la api: const jwt=require ('jsonwebtoken')

3.Creamos nuestra firma(secreta) de el JWT: const accessTokenSecret="FIRMA";

4. Utilizamos la funcion que hara de middleware para comprobar el JWT de el usuario, que siempre sera la misma:
//creem una constant que farà de middleware a qui el faci servir
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

5. añadimos a las rutas que queramos proteger con el JWT la funcion de el punto anterior, Ejemplo:

app.get('/allUsers',authenticateJWT,function (req, res) {
  ....
});
