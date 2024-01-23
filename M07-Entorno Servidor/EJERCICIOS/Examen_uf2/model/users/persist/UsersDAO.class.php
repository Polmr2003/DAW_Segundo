<?php


namespace persist;

use Users;
use usersMessage;
use identificador;
use vector;

require_once "model/users/users.class.php";
require_once "model/DBConnect.class.php";
require_once "model/ModelInterface.php";


//class to handle a users
class UsersDAO implements \ModelInterface
{

    //propietat que tenen tots els DAO per connectar-se a l'arxiu i poder fer les accions bàsiques generals
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new \DBConnect("model/users/resources/users.csv");
        $this->dbConnect_books = new \DBConnect("model/users/resources/books.csv");
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
                    $users = new users($pieces[0], $pieces[1], $pieces[2]);
                    $response[] = $users;
                }

            }
        }
        return $response;
    }

    public function login($username, $password, $csvFile)
    {

        $lines = file($csvFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            list($storedUsername, $storedPassword) = explode(';', $line);

            if ($username === $storedUsername && $password === $storedPassword) {
                return true; // Credentials match
            }
        }

        return false; // No matching credentials found
    }


    /**
     * Afegeix una categoria
     * @param users objecte
     * @return TRUE O FALSE
     */
    public function add($users)
    {

        $result = $this->dbConnect->addNewLine($users->writingNewLine());

        if ($result == FALSE) {
            $_SESSION['error'] = usersMessage::ERR_DAO['insert'];
        }

        return $result;

    }


    /**
     * Modificar una categoria
     * @param users objecte donat
     * @return TRUE o FALSE
     */
    public function modify($users)
    {

        $actual_lines = $this->dbConnect->realAllLines();
        $newPieces = [];
        if ($users[0] != -1) {
            foreach ($actual_lines as $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);

                    if ($pieces[0] == $users[0]) {

                        $pieces[0] = $users[0];
                        $pieces[1] = $users[1];

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
     * Selecionar una users per id
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
     * @return users objecte or NULL
     */
    public function searchById($id)
    {

        $actual_lines = $this->dbConnect->realAllLines();

        foreach ($actual_lines as $line) {
            if (!empty($line)) {
                $pieces = explode(";", $line);
                if ($pieces[0] == $id) {
                    $pieces = explode(";", $line);
                    $users = new users($pieces[0], $pieces[1]);
                    $response[] = $users;
                    return $response;
                }
            }

        }
        return false;

    }
    public function listAll()
    {

    }


}

?>