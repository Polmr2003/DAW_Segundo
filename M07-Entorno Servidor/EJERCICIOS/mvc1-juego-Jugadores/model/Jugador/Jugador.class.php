<?php
class Jugador {
    
    private $id;
    private $nombre;
    private $pais;
    private $numCamiseta;
    private $fNacimiento;
    private $rolJugador;
    private $numGoles;
    private $numPartidos;
    private $foto;

    /**
     * @param $id
     * @param $nombre
     * @param $pais
     * @param $numCamiseta
     * @param $fNacimiento
     * @param $rolJugador
     * @param $numGoles
     * @param $numPartidos
     */
    public function __construct($id = NULL, $nombre = NULL, $pais = NULL, $numCamiseta = NULL, $fNacimiento = NULL, $rolJugador = NULL,
                                $numGoles = NULL, $numPartidos = NULL)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->pais = $pais;
        $this->numCamiseta = $numCamiseta;
        $this->fNacimiento = $fNacimiento;
        $this->rolJugador = $rolJugador;
        $this->numGoles = $numGoles;
        $this->numPartidos = $numPartidos;
        $this->foto = $this->nombre . '.png';
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed|null $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed|null
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * @param mixed|null $pais
     */
    public function setPais($pais): void
    {
        $this->pais = $pais;
    }

    /**
     * @return mixed|null
     */
    public function getNumCamiseta()
    {
        return $this->numCamiseta;
    }

    /**
     * @param mixed|null $numCamiseta
     */
    public function setNumCamiseta($numCamiseta): void
    {
        $this->numCamiseta = $numCamiseta;
    }

    /**
     * @return mixed|null
     */
    public function getFNacimiento()
    {
        return $this->fNacimiento;
    }

    /**
     * @param mixed|null $fNacimiento
     */
    public function setFNacimiento($fNacimiento): void
    {
        $this->fNacimiento = $fNacimiento;
    }

    /**
     * @return mixed|null
     */
    public function getRolJugador()
    {
        return $this->rolJugador;
    }

    /**
     * @param mixed|null $rolJugador
     */
    public function setRolJugador($rolJugador): void
    {
        $this->rolJugador = $rolJugador;
    }

    /**
     * @return mixed|null
     */
    public function getNumGoles()
    {
        return $this->numGoles;
    }

    /**
     * @param mixed|null $numGoles
     */
    public function setNumGoles($numGoles): void
    {
        $this->numGoles = $numGoles;
    }

    /**
     * @return mixed|null
     */
    public function getNumPartidos()
    {
        return $this->numPartidos;
    }

    /**
     * @param mixed|null $numPartidos
     */
    public function setNumPartidos($numPartidos): void
    {
        $this->numPartidos = $numPartidos;
    }

    public function getFoto(): string
    {
        return $this->foto;
    }

    public function setFoto(string $foto): void
    {
        $this->foto = $foto;
    }



    public function calculate_age():string {
        // Formateamos la cadena a tipo Date con el formato día/mes/año
        $fechaNacimiento = DateTime::createFromFormat('d/m/Y', $this->fNacimiento);

        // Creamos una variable que almacena la fecha actual
        $hoy = new DateTime();

        // Calculamos la edad usando el método diff de DateTime || diff -> Devuelve la diferencia entre dos objetos DateTime
        $edad = $hoy->diff($fechaNacimiento);

        // Devolvemos solo el componente de años de la diferencia (y) || y -> year, m -> month, d -> day
        return $edad->y;
    }



}
