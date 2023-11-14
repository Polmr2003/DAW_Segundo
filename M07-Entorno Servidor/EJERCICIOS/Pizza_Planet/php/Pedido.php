<?php
// importamos las classes con las funciones
require_once 'Funtions.php';
require_once 'data.php';

// funciones
myMenu();
session_start();

// si la variable de session login no esta creada redirigimos a la paguina de login
if (!isset($_SESSION['login'])) {
    header('Location: Login.php');
}

/* ------------------------------------------- Comprobaciones de las variables---------------------------------------------------------------- */
if (isset($_POST['nombre'], $_POST['apellidos'], $_POST['telefono'], $_POST['direccion'], $_POST['correo'])) {
    //Si los datos introducidos vienen desde el método POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        // ------------------- Limpiar los datos -------------------
        $nombre = limpiarDatosFormulario($_POST["nombre"]);
        $apellidos = limpiarDatosFormulario($_POST["apellidos"]);
        $telefono = limpiarDatosFormulario($_POST["telefono"]);
        $direccion = limpiarDatosFormulario($_POST["direccion"]);
        $correo_electronico = limpiarDatosFormulario($_POST["correo"]);
    }

    // ------------------- Validar los datos -------------------
    /**
     * Validate
     * @param array $data - datos de el formulario
     * @param array $fields - requisitos de los campos
     * @param array $messages - mensajes de error
     * @return array
     */
    function validate(array $data, array $fields, array $messages = []): array
    {
        // Split the array by a separator, trim each element
        // and return the array
        $split = fn ($str, $separator) => array_map('trim', explode($separator, $str));

        // get the message rules
        $rule_messages = array_filter($messages, fn ($message) =>  is_string($message));

        // overwrite the default message
        //$validation_errors = array_merge(DEFAULT_VALIDATION_ERRORS, $rule_messages);

        $errors = [];

        foreach ($fields as $field => $option) {

            $rules = $split($option, '|');

            foreach ($rules as $rule) {
                // get rule name params
                $params = [];
                // if the rule has parameters e.g., min: 1
                if (strpos($rule, ':')) {
                    [$rule_name, $param_str] = $split($rule, ':');
                    $params = $split($param_str, ',');
                } else {
                    $rule_name = trim($rule);
                }
                // by convention, the callback should be is_<rule> e.g.,is_required
                $fn = 'is_' . $rule_name;

                if (is_callable($fn)) {
                    $pass = $fn($data, $field, ...$params);
                    if (!$pass) {
                        // get the error message for a specific field and rule if exists
                        // otherwise get the error message from the $validation_errors
                        $errors[$field] = sprintf(
                            // $messages[$field][$rule_name] ?? $validation_errors[$rule_name],
                            $field,
                            ...$params
                        );
                    }
                }
            }
        }

        return $errors;
    }
}

?>

<!-- ------------------------------------------------- HTML ----------------------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta Pizza planet</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css" />

</head>

<body>

    <nav id="menu">
        <ul>
            <li>
                <a href="logout.php">Logout</a></p>
            </li>
        </ul>
    </nav>

    <!-- Formulario -->
    <form action="./Ticket.php" method="post">
        <!-- Datos usuario -->
        <h1>Datos usuario</h1>

        <!-- Nombre del usuario -->
        <label for="nombre" class="info_usu">Nombre:</label>
        <input type="text" class="input_usu" id="nombre" name="nombre" required>
        <!-- Mostrar si las creedenciales son válidas de nombre-->
        <span style="color:red" class="Error_nom_usu" id="validacion_nombre"></span><br>

        <!-- Apellidos del usuario -->
        <label for="apellidos" class="info_usu">Apellidos:</label>
        <input type="text" class="input_usu" id="Apellidos" name="apellidos" required>
        <!-- Mostrar si las creedenciales son válidas de apellidos-->
        <span style="color:red" class="form-text" id="validacion_Apellidos"></span><br>

        <!-- Telefono del usuario -->
        <label for="Apellidos" class="info_usu">Telefono:</label>
        <input type="text" class="input_usu" id="Telefono" name="telefono" required>
        <!-- Mostrar si las creedenciales son válidas de teléfono-->
        <span style="color:red" class="form-text" id="validacion_Telefono"></span><br>

        <!-- Direccion del usuario -->
        <label for="Apellidos" class="info_usu">Direccion:</label>
        <input type="text" class="input_usu" id="Direccion" name="direccion" required>
        <!-- Mostrar si las creedenciales son válidas de dirección-->
        <span style="color:red" class="form-text" id="validacion_Direccion"></span><br>

        <!-- Correo Electronico del usuario -->
        <label for="correo" class="info_usu">Correo Electronico:</label>
        <input type="text" class="input_usu" id="Correo" name="correo" required>
        <!-- Mostrar si las creedenciales son válidas de correo-->
        <span style="color:red" class="form-text" id="validacion_Direccion"></span><br>




        <!-- Menú de las pizzas -->
        <h1>Menú pizzas</h1>
        <br>

        <!-- Contenedor flex para poner la informacion de las pizzas una al lado de otra -->
        <div style="display: flex; flex-wrap: wrap;">

            <!-- Creamos un contenedor para guardar la informacion de la pizza margarita -->
            <div style="margin: 10px; text-align: center;">

                <!-- Titulo de la pizza -->
                <h4>Pizza margarita</h4>

                <!-- Imagen de la pizza -->
                <img src="../images/margarita.jpg" width="150px" height="110px">

                <!-- Descripcion -->
                <p>ingredientes:</p>
                <ul>
                    <li>- queso mozzarella</li><br>
                    <li>- tomate</li><br>
                    <br>
                </ul>

                <!-- Formulario -->
                <h5>precio 15€</h5>

                <label for="num_pizzas_mar" class="form-label"></label>
                <input type="number" class="form-control" id="num_pizzas_mar" name="num_pizzas_mar">
                <br>
                <!-- Select con los tamaños -->
                <select name="tamaño_pizza_mar" id="tamaño_pizza_mar" class="form-select" aria-label="Default select example" required>
                    <option selected>Tamaño</option>
                    <option>mediana</option>
                    <option>familiar</option>
                    <option>individual</option>
                </select>
                <!-- Ingredientes extra de la pizza -->
                <u>
                    <h6 class="tit_info"> Ingredientes extra:</h6>
                </u>
                <p class="ingredientes">
                    <input type="checkbox" name="ingredientes_mar" value="añadir">+ jamon (0,25€)<br>
                    <input type="checkbox" name="ingredientes_mar" value="añadir">+ bacon (0,25€)<br>
                    <input type="checkbox" name="ingredientes_mar" value="añadir">+ albaha (0,25€)<br>
                    <input type="checkbox" name="ingredientes_mar" value="añadir">+ peperoni (0,25€)<br>
                </p>

                <!-- Tipo masa -->
                <u>
                    <h6 class="tit_info">Masa especial:</h6>
                </u>
                <input type="radio" name="masa_margarita" value="con_gluten_mar">Con gluten
                <input type="radio" name="masa_margarita" value="sin_gluten_mar">Sin gluten<br>

                <!-- Cerramos el contenedor con la informacion de la pizza margarita -->
            </div>

            <!-- Creamos un contenedor para guardar la informacion de la pizza carbonara -->
            <div style="margin: 10px; text-align: center;">

                <!-- Titulo de la pizza -->
                <h4>Pizza Carbonara</h4>

                <!-- Imagen de la pizza -->
                <img src="../images/carbonara.jpg" width="150px" height="110px">


                <!-- Descripcion -->
                <p>ingredientes:</p>
                <ul>
                    <li>- champiñón</li><br>
                    <li>- bacon</li><br>
                    <li>- salsa carbonara</li><br>
                </ul>

                <!-- Formulario -->
                <h5>precio 17€</h5>

                <label for="num_pizzas_car" class="form-label"></label>
                <input type="number" class="form-control" id="num_pizzas_car" name="num_pizzas_car">
                <br>

                <!-- Select con los tamaños -->
                <select name="tamaño_pizza_car" id="tamaño_pizza_car" class="form-select" aria-label="Default select example" required>
                    <option selected>Tamaño</option>
                    <option>mediana</option>
                    <option>familiar</option>
                    <option>individual</option>
                </select>
                <!-- Ingredientes extra de la pizza -->
                <u>
                    <h6 class="tit_info"> Ingredientes extra:</h6>
                </u>

                <p class="ingredientes">
                    <input type="checkbox" name="ingredientes_car" value="añadir">+ Atun (0,25€)<br>
                    <input type="checkbox" name="ingredientes_car" value="añadir">+ Bacon (0,25€)<br>
                    <input type="checkbox" name="ingredientes_car" value="añadir">+ Aceitunas (0,25€)<br>
                    <input type="checkbox" name="ingredientes_car" value="añadir">+ Pimiento (0,25€)<br>
                </p>

                <!-- Tipo masa -->
                <u>
                    <h6 class="tit_info">Masa especial:</h6>
                </u>
                <input type="radio" name="masa_carbonara" value="con_gluten_car">Con gluten
                <input type="radio" name="masa_carbonara" value="sin_gluten_car">Sin gluten<br>

                <!-- Cerramos el contenedor con la informacion de la pizza carbonara -->
            </div>

            <!-- Creamos un contenedor para guardar la informacion de la pizza barbacoa -->
            <div class="div_informacion">

                <!-- Titulo de la pizza -->
                <h4>Pizza barbacoa</h4>

                <!-- Imagen de la pizza -->
                <img src="../images/barbacoa.jpg" width="150px" height="110px">

                <!-- Descripcion -->
                <p>ingredientes:</p>
                <ul>
                    <li>- pollo</li><br>
                    <li>- bacon</li><br>
                    <li>- carne vacuno</li><br>
                </ul>

                <!-- Formulario -->
                <h5>precio 13€</h5>

                <label for="num_pizzas_bar" class="form-label"></label>
                <input type="number" class="form-control" id="num_pizzas_bar" name="num_pizzas_bar">
                <br>
                <!-- Select con los tamaños -->
                <select name="tamaño_pizza_bar" id="tamaño_pizza_car" class="form-select" aria-label="Default select example" required>
                    <option selected>Tamaño</option>
                    <option>mediana</option>
                    <option>familiar</option>
                    <option>individual</option>
                </select>
                <!-- Ingredientes extra de la pizza -->
                <u>
                    <h6 class="tit_info"> Ingredientes extra:</h6>
                </u>

                <p class="ingredientes">
                    <input type="checkbox" name="ingredientes_bar" value="añadir">+ Queso (0,25€)<br>
                    <input type="checkbox" name="ingredientes_bar" value="añadir">+ Carne (0,25€)<br>
                    <input type="checkbox" name="ingredientes_bar" value="añadir">+ Salsa (0,25€)<br>
                    <input type="checkbox" name="ingredientes_bar" value="añadir">+ pimiento verde (0,25€)<br>
                </p>

                <!-- Tipo masa -->
                <u>
                    <h6 class="tit_info">Masa especial:</h6>
                </u>
                <input type="radio" name="masa_barbacoa" value="con_gluten_bar">Con gluten
                <input type="radio" name="masa_barbacoa" value="sin_gluten_bar">Sin gluten<br>

                <!-- Cerramos el contenedor con la informacion de la pizza barbacoa -->
            </div>

            <!-- Creamos un contenedor para guardar la informacion de la pizza 4 quesos -->
            <div style="margin: 10px; text-align: center;">

                <!-- Titulo de la pizza -->
                <h4>Pizza 4 quesos</h4>

                <!-- Imagen de la pizza -->
                <img src="../images/4quesos.jpeg" width="150px" height="110px">

                <!-- Descripcion -->
                <p>ingredientes:</p>
                <ul>
                    <li>- salsa tomate</li><br>
                    <li>- mozzarella, queso azul</li><br>
                    <li>- emmental, edam</li><br>
                </ul>

                <!-- Formulario -->
                <h5>precio 20€</h5>

                <label for="num_pizzas_que" class="form-label"></label>
                <input type="number" class="form-control" id="num_pizzas_que" name="num_pizzas_que">
                <br>
                <!-- Select con los tamaños -->
                <select name="tamaño_pizza_que" id="tamaño_pizza_que" class="form-select" aria-label="Default select example" required>
                    <option selected>Tamaño</option>
                    <option>mediana</option>
                    <option>familiar</option>
                    <option>individual</option>
                </select>
                <!-- Ingredientes extra de la pizza -->
                <u>
                    <h6 class="tit_info"> Ingredientes extra:</h6>
                </u>

                <p class="ingredientes">
                    <input type="checkbox" name="ingredientes_que" value="añadir">+ Jamon (0,25€)<br>
                    <input type="checkbox" name="ingredientes_que" value="añadir">+ Bacon (0,25€)<br>
                    <input type="checkbox" name="ingredientes_que" value="añadir">+ caebolla caramelizada (0,25€)<br>
                    <input type="checkbox" name="ingredientes_que" value="añadir">+ miel (0,25€)<br>
                </p>

                <!-- Tipo masa -->
                <u>
                    <h6 class="tit_info">Masa especial:</h6>
                </u>
                <input type="radio" name="masa_quesos" value="con_gluten_que">Con gluten
                <input type="radio" name="masa_quesos" value="sin_gluten_que">Sin gluten<br>

                <!-- Cerramos el contenedor con la informacion de la pizza 4 quesos -->
            </div>

            <!-- Cerramos el display flex -->
        </div>




        <!-- Ofertas -->
        <h1>Ofertas</h1>

        <!-- Bebida + pizza familiar -->
        <label for="Bebida_+_pizza" class="form-label">Pizza carbonara (familiar) + bebida a elegir:</label>
        <input type="checkbox" class="form-control" id="Bebida_+_pizza" name="Bebida_+_pizza">
        <!-- Mostrar si las creedenciales son válidas de nombre-->
        <span style="color:red" class="form-text" id="Bebida_+_pizza"></span><br>


        <!-- pizza + pizza  -->
        <label for="pizza_+_pizza" class="form-label">Pizza margarita (individual) + Pizza barbacoa (individual):</label>
        <input type="checkbox" class="form-control" id="pizza+_pizza" name="pizza_+_pizza">
        <!-- Mostrar si las creedenciales son válidas de nombre-->
        <span style="color:red" class="form-text" id="pizza_+_pizza"></span><br>


        <!-- media + normal -->
        <label for="media_+_normal" class="form-label">Pizza 4 quesos (mediana) + Pizza carbonara (individual)</label>
        <input type="checkbox" class="form-control" id="media_+_normal" name="media_+_normal">
        <!-- Mostrar si las creedenciales son válidas de nombre-->
        <span style="color:red" class="form-text" id="media_+_normal"></span><br><br>




        <!-- Boton -->
        <button class="my_Btn">
            <p class="txt_my_Btn">Comprar</p>
        </button>
    </form>

</body>

</html>