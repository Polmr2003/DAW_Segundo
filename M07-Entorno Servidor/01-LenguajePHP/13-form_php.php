<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form get & post</title>
</head>

<body>

    <?php
        if (isset($_GET)) {
            echo ("el formulario se envio con exito <br>");
            echo "<pre>";
            print_r($_GET);
            echo "</pre>";
        }
    ?>

    <form action="" method="get">

        <div>
            dime tu edad : <input type="text" name="edad" placeholder="pon tu edad">
        </div>

        <div>
            dime tu ciudad : <input type="text" name="ciudad" placeholder="pon tu ciudad">
        </div>

        <div>
            ¿en que año naciste?

            <select name="anyoNacimiento">
                <option value="null">Selecciona un año</option>

                <?php
                $años = 1900;
                while ($años < 2023) {

                ?>
                    <option value="<?= $años; ?>"><?= $años; ?></option> <!-- <"?=$años?> es un echo de la variable, en value se tiene que poner el ; porque es una instruccion -->
                <?php
                    $años++;
                }
                ?>
            </select>
        </div>

        <div>
            <input type="submit" value="Validar">
        </div>

    </form>
</body>

</html>