<?php


namespace persist;

use identificador;
use Jugador;
use JugadorMessage;
use vector;

require_once "model/Jugador/Jugador.class.php";
require_once "model/DBConnect.class.php";
require_once "model/ModelInterface.php";


//class to handle a jugador
class JugadorDAO
{

    //propietat que tenen tots els DAO per connectar-se a l'arxiu i poder fer les accions bàsiques generals
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new \DBConnect("model/Jugador/resources/jugadores.txt");
    }

    /**
     * Recull totes les categories
     * @param void
     * @return vector amb tots els objectes de categories
     */
    public function home()
    {
        $response = array();
        $linesToFile = array();
        $linesToFile = $this->dbConnect->realAllLines();
        if (count($linesToFile) > 0) {
            foreach ($linesToFile as $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);
                    $jugador = new Jugador($pieces[0], $pieces[1], $pieces[2], $pieces[3], $pieces[4], $pieces[5], $pieces[6], $pieces[7]);
                    $response[] = $jugador;
                }

            }
        }
        return $response;
    }







    /**
     * ejeercicio 1 lee del fichero los jugadores y devuelve un array con solo los nombres de los jugadores
     * @return array de Nombres de jugadores
     */
    public function ejer1_arrayNombres()
    {
        $jugadorName = [];
        $linesToFile = array();
        $linesToFile = $this->dbConnect->realAllLines();
        if (count($linesToFile) > 0) {
            foreach ($linesToFile as $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);
                    $jugadorName[] = $pieces[1];
                }

            }
        }


        return $jugadorName;

    }







    /**
     * Modificar una categoria
     * @param Jugador objecte donat
     * @return TRUE o FALSE
     */
    public function modify($jugador)
    {

        $actual_lines = $this->dbConnect->realAllLines();
        $newPieces = [];
        if ($jugador[0] != -1) {
            foreach ($actual_lines as $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);

                    if ($pieces[0] == $jugador[0]) {

                        $pieces[0] = $jugador[0];
                        $pieces[1] = $jugador[1];

                    }

                    print_r($pieces);

                    $newPieces[] = $pieces;

                }

            }
        }

        //paso de un array bidimensional a un array unidimensional para poder pasarlo a la function writeToFile del dbConnect
        $arrayUnidimensional = array_map(function ($subarray) {
            return $subarray[1];
        }, $newPieces);


        $this->dbConnect->writeToFile($arrayUnidimensional);

    }


    /**
     * Esborra una categoria donat l' id
     * @param $id identificador de la categoria a buscar
     * @return TRUE O FALSE
     */
    public function delete($id)
    {

        $actual_lines = $this->dbConnect->realAllLines();
        $newPieces = [];

        if ($id != -1) {
            foreach ($actual_lines as $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);

                    //he agregado una instrucción continue para que, cuando se encuentre una línea con $pieces[0] igual a $id,
                    // se salte esa iteración del bucle y no se incluya en el array $newPieces.
                    // De esta manera, esa línea se "eliminará" del resultado final. El resto de las líneas seguirán siendo procesadas
                    // y mostradas según el código existente.

                    /*
                    continue is used to end the current iteration in a for , foreach , while or do.. while loop, and continue to the next iteration.
                    */
                    if ($pieces[0] == $id) {
                        continue;
                    }


                    print_r($pieces);

                    $newPieces[] = $pieces;

                }

            }

            $arrayUnidimensional = array_map(function ($subarray) {
                return $subarray[1];
            }, $newPieces);


            $this->dbConnect->writeToFile($arrayUnidimensional);

            return true;
        }

        return false;

    }


    /**
     * Selecionar una jugador per id
     * si lo encuentra retorna el $id
     * si no lo encuentra retorna -1
     * @param $id identificador de la product a buscar
     * @return identificador objecte or NULL
     */
    public function searchByIdModify($id)
    {

        $actual_lines = $this->dbConnect->realAllLines();
        $VALOR_NO_ENCONTRADO = -1;

        foreach ($actual_lines as $line) {
            if (!empty($line)) {
                $pieces = explode(";", $line);
                if ($pieces[0] == $id) {
                    return $id;
                }
            }

        }
        return $VALOR_NO_ENCONTRADO;

    }

    /**
     * Selecionar una categoria per id
     * @param $id identificador de la categoria a buscar
     * @return Jugador objecte or NULL
     */
    public function searchById($id)
    {

        $actual_lines = $this->dbConnect->realAllLines();

        foreach ($actual_lines as $line) {
            if (!empty($line)) {
                $pieces = explode(";", $line);
                if ($pieces[0] == $id) {
                    $pieces = explode(";", $line);
                    $jugador = new Jugador($pieces[0], $pieces[1]);
                    $response[] = $jugador;
                    return $response;
                }
            }

        }
        return false;

    }


}

?>
