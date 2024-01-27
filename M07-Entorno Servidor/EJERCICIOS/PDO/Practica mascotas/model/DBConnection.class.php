<?php

class DBConnection
{
    //atributs 
    private $dsn = "mysql:host=localhost;dbname=mascotasclinic";
    private $user = "m07";
    private $password = "m07";
    private $dbh;
    
    //mètode que necessitem per connectar-nos des dels altres
    //mètodes
    private function connect()
    {
        $flag = true;

        try {
            $this->dbh = new PDO($this->dsn, $this->user, $this->password);
        } catch (PDOException $e) {
            $flag = false;
        }
        return $flag;
    }

    //ens desconnectem de la base de dades
    private function disconnect()
    {
        $this->dbh = null;
    }

    public function myQuery($sql, $vector)
    {
        $sentencia = null;
        //select, insert, update,delete
        if ($this->connect()) {

            try {
                $sentencia = $this->dbh->prepare($sql);
            } catch (PDOException $e) {

            }

            if ($sentencia->execute($vector) != false) {
                $this->disconnect();
            }
        }

        return $sentencia;
    }
}
