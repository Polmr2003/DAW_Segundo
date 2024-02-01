<?php
class users
{

    private $id;
    private $password;
    private $rol;

    /**
     * @param $id
     * @param $password
     */
    public function __construct($id = NULL, $password = NULL, $rol = NULL) 
    {
        $this->id = $id;
        $this->password = $password;
        $this->rol = $rol;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|null $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed|null $nombre
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed|null
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed|null $nombre
     */
    public function setRol($rol): void
    {
        $this->rol = $rol;
    }

    

}
