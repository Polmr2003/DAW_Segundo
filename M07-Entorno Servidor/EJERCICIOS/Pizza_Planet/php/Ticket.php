<?php
session_start();

// si la variable de session login no esta creada redirigimos a la paguina de login
if (!isset($_SESSION['login'])) {
    header('Location: Login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ticket del pedido</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
</head>

<body>
    <h3>Resumen del Pedido</h3>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        /* ------------------------------------------- Cojemos las variables de el usuario ---------------------------------------------------------------- */
        $nombre = $_POST['nombre']; /* Para esto es necesario poner un name al input en el php, i poner el mismo nombre aqui (name="nombre") */
        $apellidos = $_POST["apellidos"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $correo_electronico =  $_POST["correo"];

        /* ------------------------------------------- Calculamos el dinero total del pedido ---------------------------------------------------------------- */
        // variable para guardar el dinero del pedido
        $total = 0;

        /*------------------------ Pizza margarita ------------------------ */
        if (isset($_POST["num_pizzas_mar"]) && isset($_POST["tamaño_pizza_mar"]) && !($_POST["num_pizzas_mar"] <= 0)) {
            //variable con el numero de las pizzas
            $num_pizzas_mar = intval($_POST["num_pizzas_mar"]);

            //variable con el tamaña de las pizzas
            $tamaño_pizza_mar = $_POST["tamaño_pizza_mar"];

            // variable con el precio de las pizzas
            $precio_pizza_mar = 0;

            if ($num_pizzas_mar === "mediana") {
                $precio_pizza_mar = 15;
            } elseif ($tamaño_pizza_mar === "familiar") {
                $precio_pizza_mar = 17;
            } elseif ($tamaño_pizza_mar === "individual") {
                $precio_pizza_mar = 13;
            }

            $total += $num_pizzas_mar * $precio_pizza_mar;
        }

        /*------------------------ Pizza carbonara ------------------------ */
        if (isset($_POST["num_pizzas_car"]) && isset($_POST["tamaño_pizza_car"]) && !($_POST["num_pizzas_car"] <= 0)) {
            //variable con el numero de las pizzas
            $num_pizzas_car = intval($_POST["num_pizzas_car"]);

            //variable con el tamaña de las pizzas
            $tamaño_pizza_car = $_POST["tamaño_pizza_car"];

            // variable con el precio de las pizzas
            $precio_pizza_car = 0;

            //
            if ($tamaño_pizza_car === "mediana") {
                //
                $precio_pizza_car = 15;
            } elseif ($tamaño_pizza_car === "familiar") {
                //
                $precio_pizza_car = 17;
            } elseif ($tamaño_pizza_car === "individual") {
                //
                $precio_pizza_car = 13;
            }

            $total += $num_pizzas_car * $precio_pizza_car;
        }

        /*------------------------ Pizza barbacoa ------------------------ */
        // Si estan definidas las variables de la pizza barbacoa i no esta vacio 
        if (isset($_POST["num_pizzas_bar"]) && isset($_POST["tamaño_pizza_bar"]) && !($_POST["num_pizzas_bar"] <= 0)) {
            //variable con el numero de la pizza
            $num_pizzas_bar = intval($_POST["num_pizzas_bar"]);

            //variable con el tamaña de la pizza
            $tamaño_pizza_bar = $_POST["tamaño_pizza_bar"];

            // variable para guardar el precio de la pizzza dependiendo de la tamaño
            $precio_pizza_bar = 0;

            // miramos el tamaño de la pizza
            if ($tamaño_pizza_bar === "mediana") {
                // si el tamaño de la pizza es mediana
                $precio_pizza_bar = 15; // el precio sera de 15 €
            } elseif ($tamaño_pizza_bar === "familiar") {
                // si el tamaño de la pizza es familiar
                $precio_pizza_bar = 17;
            } elseif ($tamaño_pizza_bar === "individual") {
                // si el tamaño de la pizza es individual
                $precio_pizza_bar = 13;
            }


            $total += $num_pizzas_bar * $precio_pizza_bar;
        }

        /*------------------------ Pizza 4 quesos ------------------------ */
        if (isset($_POST["num_pizzas_que"]) && isset($_POST["tamaño_pizza_que"]) && !($_POST["num_pizzas_que"] <= 0)) {
            //variable con el numero de las pizzas
            $num_pizzas_que = intval($_POST["num_pizzas_que"]);

            //variable con el tamaña de las pizzas
            $tamaño_pizza_que = $_POST["tamaño_pizza_que"];

            // variable con el precio de las pizzas
            $precio_pizza_que = 0;

            //
            if ($tamaño_pizza_que === "mediana") {
                //
                $precio_pizza_que = 15;
            } elseif ($tamaño_pizza_que === "familiar") {
                //
                $precio_pizza_que = 17;
            } elseif ($tamaño_pizza_que === "individual") {
                //
                $precio_pizza_que = 13;
            }

            $total += $num_pizzas_que * $precio_pizza_que;
        }

        /*------------------------ Ofertas ------------------------ */

        // Si an seleccionado la oferta de pizza + bebida
        if (isset($_POST["Bebida_+_pizza"])) {
            // Sumamos el precio de la oferta
            $total += 3;
        }

        // Si an seleccionado la oferta de pizza + pizza
        if (isset($_POST["pizza+_pizza"])) {
            // Sumamos el precio de la oferta
            $total += 15;
        }


        // Si an seleccionado la oferta de mediana + normal
        if (isset($_POST["media_+_normal"])) {
            // Sumamos el precio de la oferta
            $total += 18;
        }


        // Calculate el iva de el total (IVA: 21%)
        $iva = 0.21 * $total;


        // Calculamos el precio total sumando el pedido mas iva
        $total_con_iva = $total + $iva;
    }
    ?>


    <!-- ------------------------------------------- Mostrar Datos usuario ---------------------------------------------------------------- -->

    <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
    <p><strong>Apellidos:</strong> <?php echo $apellidos; ?></p>
    <p><strong>Teléfono:</strong> <?php echo $telefono; ?></p>
    <p><strong>Dirección:</strong> <?php echo $direccion; ?></p>
    <p><strong>Correo Electronico:</strong> <?php echo $correo_electronico; ?></p>

    <!-- ------------------------------------------- Mostrar Productos del pedido ---------------------------------------------------------------- -->

    <!-- Mostramos los productos seleccionados i el precio total -->
    <hr>
    <h3>Productos Seleccionados:</h3>
    <ul class='lista_pedidos'>
        <?php

        /*------------------------ Pizzas ------------------------ */

        // Si an pedido una pizza margarita mostramos, la cantidad i el tamaño
        if (isset($_POST["num_pizzas_mar"]) && isset($_POST["tamaño_pizza_mar"]) && !($_POST["num_pizzas_mar"] <= 0)) {
            echo "<li class='lista_pedidos'> $num_pizzas_mar Pizza margarita $tamaño_pizza_mar</li>";
        }

        // Si an pedido una pizza carbonara mostramos, la cantidad i el tamaño
        if (isset($_POST["num_pizzas_car"]) && isset($_POST["tamaño_pizza_car"]) && !($_POST["num_pizzas_car"] <= 0)) {
            echo "<li class='lista_pedidos'> $num_pizzas_car Pizza carbonara $tamaño_pizza_car</li>";
        }

        // Si an pedido una pizza barbacoa mostramos, la cantidad i el tamaño
        if (isset($_POST["num_pizzas_bar"]) && isset($_POST["tamaño_pizza_bar"]) && !($_POST["num_pizzas_bar"] <= 0)) {
            echo "<li class='lista_pedidos'> $num_pizzas_bar Pizza barbacoa $tamaño_pizza_bar</li>";
        }

        // Si an pedido una pizza 4 quesos mostramos, la cantidad i el tamaño
        if (isset($_POST["num_pizzas_que"]) && isset($_POST["tamaño_pizza_que"]) && !($_POST["num_pizzas_que"] <= 0)) {
            echo "<li class='lista_pedidos'> $num_pizzas_que Pizza 4 quesos $tamaño_pizza_que</li>";
        }

        /*------------------------ Ofertas ------------------------ */

        // Si an pedido una pizza carbonara mostramos, la cantidad i el tamaño
        if (isset($_POST["Bebida_+_pizza"])) {
            echo "<li class='lista_pedidos'>Pizza Carbonara (familiar) + Bebida</li>";
        }

        // Si an pedido una pizza barbacoa mostramos, la cantidad i el tamaño
        if (isset($_POST["pizza_+_pizza"])) {
            echo "<li class='lista_pedidos'>Pizza Margarita (individual) + Pizza Barbacoa (individual)</li>";
        }

        // Si an pedido una pizza 4 quesos mostramos, la cantidad i el tamaño
        if (isset($_POST["media_+_normal"])) {
            echo "<li class='lista_pedidos'>Pizza 4 Quesos (mediana) + Pizza Carbonara (individual)</li>";
        }

        ?>
    </ul>

    <!-- ------------------------------------------- Mostrar el precio total ---------------------------------------------------------------- -->
    <p><strong>Importe Total:</strong> <?php echo $total; ?> €</p>
    <p><strong>IVA (21%):</strong> <?php echo $iva; ?> €</p>
    <p><strong>Total con IVA:</strong> <?php echo $total_con_iva; ?> €</p>

    <!-- ------------------------------------------- Imprimir tiket en PDF ---------------------------------------------------------------- -->
    <!-- Boton -->
    <button class="my_Btn_tiket">
        <p class="txt_my_Btn_tiket">Imprimir tiket en PDF</p>
    </button>

</body>

</html>