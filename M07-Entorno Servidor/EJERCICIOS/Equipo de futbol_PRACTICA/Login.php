<?php
/*
Mostrar cabecera, menú, pie de página y formulario login
*/

//Llamada a los archivos 
require_once './funciones-estructura.php';
require_once './funciones.php';
require_once './funciones_archivos.php';
require_once './datos.php';

//Llamada a las funciones
myHeader();
session_start();

// si la variable de session login no esta creada redirigimos a la pagina de login
if (isset($_SESSION['login'])) {
    //mostramos el menu que tienen los usuarios logeados
    menuLogin();

    $nombre = $_SESSION['User'];
    echo "Te has logeado " . $_COOKIE[$nombre] . " veces";
} else {
    // Si no esta creada la varaible de session login, mostramos el menu de los usuarios no logeados
    myMenu();
}


?>
<!------------------------------------------------------------------------------------------------------>

<!------ WEB CODE ----->

<body>
    <div class="div_login">
        <!-- Formulario -->
        <form action="" method="post">
            <!-- Datos usuario -->
            <h1>Login</h1>

            <!-- Nombre del entrenador -->
            <label for="nombre" class="info_usu">Nombre de usuario:</label>
            <input type="text" class="input_usu_login" id="nombre" name="nombre">
            <br>
            <br>
            <!-- Contraseña del usuario -->
            <label for="contraseña" class="info_usu">Contraseña:</label>
            <input type="password" class="input_usu_login" id="contraseña" name="contraseña">

            <br>
            <br>
            <!-- Boton -->
            <button class="btn btn-primary">Conectarse</button>
        </form>
    </div>

    <?php
    /* ------------------------------------------- Comprobaciones Login ---------------------------------------------------------------- */
    if (isset($_POST['nombre'], $_POST['contraseña'])) {
        // Si los datos introducidos vienen desde el método POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nombre = $_POST['nombre'];
            $contraseña = $_POST['contraseña'];


            // ------------------- Leemos los datos de el fichero csv -------------------
            $data_usuarios = read_info_csv_with_return($archivo_usuarios);

            $usu = []; //array con los usuarios
            $con = []; //array con las contraseñas

            // recorremos el array con los datos de usuario
            foreach ($data_usuarios as $data_usu => $data) {
                array_push($usu, $data[0]); // $data[0]=usuarios
                array_push($con, $data[1]); // $data[1]=contraseñas
            }

            // Recorremos las posiciones de los arrays i verificamos si coinciden el usuario con la contraseña
            $flag = false;
            for ($i = 0; $i < count($usu); $i++) {
                if ($usu[$i] == $nombre) {
                    $flag = true;
                    // si encuentra el usuario
                    if ($con[$i] == $contraseña) {
                        //si la contraseña es la del usuario (están en la misma posición el usuario y la contraseña)

                        // Creamos la variable de sesión para saber si está logeado el usuario
                        $_SESSION['login'] = "yes";

                        // Creamos el contador de sesiones de cada usuario
                        for ($i = 1; $i < 3; $i++) {

                            // creamos la variable de session con el nombre de usuario para mostrar cuantas veces se a logeado
                            if (isset($_SESSION['User'])) {
                                // si esta creada metemos el nombre en la variable de session user
                                $_SESSION['User'] = $_POST['nombre'];
                            } else {
                                // si no esta creada ponemos la variable vacia
                                $_SESSION['User'] = "";
                            }

                            // Creamos la cookie
                            $nombre_usuario = $_POST['nombre'];

                            if (isset($_COOKIE[$nombre_usuario])) { //si el usuario ha enviado su nombre al formulario y se ha logeado
                                $numero_login = $_COOKIE[$nombre_usuario] + 1; //a la cookie se le suma 1 
                            } else {
                                $numero_login = 1; //si es la primera que se logea, la cookie vale solo 1
                            }
                            setcookie($nombre_usuario, $numero_login);
                        }

                        // reedirigimos a la misma pagina
                        header('Location: Login.php');
                    } else {
                        // si la contraseña está mal
                        echo '<span style="color: red;">Password incorrecto</span>';
                    }
                }
            }
            if (!$flag) {
                // si no ha encontrado al usuario
                echo '<span style="color: red;">El usuario no existe</span>';
            }
        }
    }


    ?>




</body>

<!----- FOOTER ------>
<?php
myFooter();
?>