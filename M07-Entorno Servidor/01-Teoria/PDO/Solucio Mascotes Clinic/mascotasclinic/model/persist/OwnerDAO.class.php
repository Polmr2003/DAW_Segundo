<?php
require_once "model/Owner.class.php";
require_once "model/persist/DBConnection.class.php";
require_once "model/persist/ModelInterface.php";

class OwnerDAO implements ModelInterface
{
    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection = new DBConnection();
    }

    /**
     * Gather all owners
     * @param void
     * @return array with all owners
     */
    public function listAll()
    {
        // declare array for results
        $response = array();

        // myQuery params
        $sql = "SELECT * FROM propietarios"; // Listar todos los propietarios (1 punt)
        $vector = array(); // empty array because no params are needed for a 'select all' query

        // prepare sentence
        $sentence = $this->dbConnection->myQuery($sql, $vector);
        
        if ($sentence != null && $sentence->rowCount() != 0)
        {
            foreach ($sentence as $line)
            {
                $owner = new Owner($line["nif"], $line["nom"], $line["email"], $line["movil"]);
                $response[] = $owner;
            }
        }

        return $response;
    }

    /**
     * Retrieves a owner from the DB given its $nif
     * @param $nif of owner to retrieve
     * @return owner found with that nif in the database. If none found, returns null
     */
    public function searchById($nif)
    {
        // declare array for results
        $owner = NULL;

        // myQuery params
        $sql = "SELECT * FROM propietarios WHERE nif=?";
        $vector = array($nif);

        // prepare sentence
        $sentence = $this->dbConnection->myQuery($sql, $vector);
        
        if ($sentence != null && $sentence->rowCount() != 0)
        {
            foreach ($sentence as $line)
            {
                $owner = new Owner($line["nif"], $line["nom"], $line["email"], $line["movil"]);
            }
        }

        return $owner;
    }

    /**
     * Modifies a owner in the DB given its $nif and params
     * @param owner to modify
     * @return true if the owner was modified successfully, false otherwise
     */
    public function modify($owner)
    {
        // myQuery params
        $sql = "UPDATE propietarios SET email=?, movil=? WHERE nif=?"; // Modificar propietario (1,5 punts)
        $vector = array( $owner->getEmail(), $owner->getPhone(), $owner->getNif() );

        // prepare sentence
        $sentence = $this->dbConnection->myQuery($sql, $vector);
        
        if ($sentence != null && $sentence->rowCount() != 0)
        {
            return true;
        }

        return false;
    }




    // ============== UNUSED METHODS ============== //





    /**
     * Writes a new owner into the database
     * @param owner to add
     * @return true if the owner was added successfully, false otherwise
     */
    public function add($owner)
    {
        // myQuery params
        $sql = "INSERT INTO propietarios (nif, nom, email, movil) VALUES (?, ?, ?, ?)";
        $vector = array( $owner->getNif(), $owner->getName(), $owner->getEmail(), $owner->getPhone() );

        // prepare sentence
        $sentence = $this->dbConnection->myQuery($sql, $vector);
        
        if ($sentence != null && $sentence->rowCount() != 0)
        {
            return true;
        }

        return false;
    }

    /**
     * Deletes a owner from the DB given its $nif
     * @param $nif of owner to delete
     * @return true if the owner was deleted successfully, false otherwise
     */
    public function delete($nif)
    {
        // myQuery params
        $sql = "DELETE FROM propietarios WHERE nif=?";
        $vector = array($nif);

        // prepare sentence
        $sentence = $this->dbConnection->myQuery($sql, $vector);
        
        if ($sentence != null && $sentence->rowCount() != 0)
        {
            return true;
        }

        return false;
    }
}
