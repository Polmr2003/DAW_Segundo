<!-- ampliación para nuestro desarrollo de coches:
Estaba pensado para la gestión de vehículos de un parking de 2 plantas subterráneas más una de superficie.
Ahora se va a ampliar su uso a furgonetas y autobuses.
Los autobuses no pueden aparcar en las plantas subterráneas pero sí en la superficie y además debo conocer el nombre de la empresa propietaria.
Las furgonetas solo pueden aparcar en la primera planta subterránea o en superficie y además debo conocer la altura.
Los coches solo pueden aparcar en las plantas subterráneas pero no en la superficie.
Una posible solución podría pasar por realizar las siguientes acciones:
Modificar la clase Coche (y su archivo correspondiente) para que ahora se llame Vehículo.
Añadir el atributo planta y sus correspondientes get() y set() para hacer referencia a la planta en la que estaciona el vehículo (aunque no aparezca en el constructor al no saber en qué planta estará el coche).
Añadir los atributos planta y plantas con un array que incluya las diferentes plantas disponibles.
Crear las clases Autobus, Furgoneta y Coche que extiendan la clase Vehiculo e incorporen el método puedeAparcar() para comprobar si puede o no puede aparcar, en función de la planta de entrada (este método se llamará igual pero será diferente en cada clase).
Añadir a la clase Autobus el atributo empresa y sobre-escribir el constructor para que incluya dicho atributo. -->

<?php
    //Requiero los archivos de clase para incluirlos en este script
    require("Autobus.php");
    require("Furgoneta.php");
    require("Coche.php");
?>

<h1>Ejemplo 4: Herencia, Extensión y Polimorfismo</h1>

<?php
    //Instancio y configuro los vehículos
    $autobus = new Autobus("Volvo","9800 2017","gris","Mario","Desfufor");
    $furgoneta = new Furgoneta("Wolkswagen","Caravelle","blanco","Rebeca");
    $coche = new Coche("Toyota","Corolla","verde","Marcos");
?>

<div>
    ¿Puedo aparcar el coche en la superficie?:
    <strong><?php echo ($coche->puedeAparcar("superficie")) ? "si" : "no" ?></strong>
</div>

<div>
    ¿Puedo aparcar el coche en el subterráneo 2?:
    <strong><?php echo ($coche->puedeAparcar("subterraneo2")) ? "si" : "no" ?></strong>
</div>

<div>
    ¿Puedo aparcar la furgoneta en la superficie?:
   <strong><?php echo ($furgoneta->puedeAparcar("superficie")) ? "si" : "no" ?></strong>
</div>

<div>
    ¿Puedo aparcar la furgoneta el subterráneo 2?:
    <strong><?php echo ($furgoneta->puedeAparcar("subterraneo2")) ? "si" : "no" ?></strong>
</div>

<div>
    ¿Puedo aparcar el autobús en la superficie?:
    <strong><?php echo ($autobus->puedeAparcar("superficie")) ? "si" : "no" ?></strong>
</div>

<div>
    ¿Puedo aparcar el autobús el subterráneo 1?:
    <strong><?php echo ($autobus->puedeAparcar("subterraneo1")) ? "si" : "no" ?></strong>
</div>

<div>
    ¿A qué empresa pertenece el autobús?:
    <strong><?php echo $autobus->getEmpresa() ?></strong>
</div>