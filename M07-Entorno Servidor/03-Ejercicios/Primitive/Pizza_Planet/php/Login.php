<?php
// importamos las classes con las funciones
require_once 'Funtions.php';
require_once 'data.php';
//require_once 'Pedido.php';

//funciones
myMenu();
session_start();

?>

<!-- ------------------------------------------------- HTML ----------------------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza planet</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
</head>

<body>
    <div class="div_login">
        <!-- Formulario -->
        <form action="" method="post">
            <!-- Datos usuario -->
            <h1>Login</h1>

            <!-- Nombre del usuario -->
            <label for="nombre_usu" class="info_usu_login">Nombre de usuario:</label><br>
            <input type="text" class="input_usu_login" id="nombre_usu" name="nombre_usu" required>
            <!-- Mostrar si las creedenciales son válidas de nombre-->
            <span style="color:red" class="Error_nom_usu" id="validacion_nombre"></span><br>

            <!-- Apellidos del usuario -->
            <label for="contraseña_usu" class="info_usu_login">Contraseña:</label><br>
            <input type="password" class="input_usu_login" id="contraseña_usu" name="contraseña_usu" required>
            <!-- Mostrar si las creedenciales son válidas de apellidos-->
            <span style="color:red" class="form-text" id="validacion_Apellidos"></span><br><br>


            <!-- Boton -->
            <button class="my_Btn_login">
                <p class="txt_my_Btn_login">Conectarse</p>
            </button>
        </form>
    </div>


    <?php
    /* ------------------------------------------- Comprobaciones Login ---------------------------------------------------------------- */
    if (isset($_POST['nombre_usu'], $_POST['contraseña_usu'])) {
        // Si los datos introducidos vienen desde el método POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // ------------------- Limpiar los datos -------------------
            $nombre_usu = limpiarDatosFormulario($_POST["nombre_usu"]);
            $contraseña_usu = limpiarDatosFormulario($_POST["contraseña_usu"]);

            // ------------------- Comprovamos que el usuario este en el array de los usuarios registrados -------------------
            if (array_key_exists($nombre_usu, $datos_login)) {
                // Si exite (la key) el usuario en el array de datos con el login
                if (in_array($contraseña_usu, $datos_login)) {
                    // Si con la key con el nombre de el usuario exite el valor con la contraseña que halla puesto el usuario
                    
                    // creamos la variable de session login para saber si esta logeado el usuario
                    $_SESSION['login'] = "yes";

                    header('Location: Pedido.php'); // redirigimos a la carta para pedir
                }
            } else {
                remove_var_session();
                echo "<h1> NO Existe este usuario</h1>";
            }
        }
    }
    ?>

</body>

</html>