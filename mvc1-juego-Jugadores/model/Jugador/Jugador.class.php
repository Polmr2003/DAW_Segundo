<?php
class Jugador
{

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
    public function __construct(
        $id = NULL,
        $nombre = NULL,
        $pais = NULL,
        $numCamiseta = NULL,
        $fNacimiento = NULL,
        $rolJugador = NULL,
        $numGoles = NULL,
        $numPartidos = NULL
    ) {
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

    /**
     * Funcion para calcular la edad de una persona
     * @param string $date - recojemos la fecha de su nacimiento
     * $fechaNacimiento - cremos la variable $fechaNacimiento para guardar la fecha que nacio la persona, pasandole la fecha que recojimos
     * $hoy - creamos el objeto con DateTime para ver la fecha actual
     * $edad - usamos el metodo diff i vemos la diferencia entre la fecha que nacio i la de ahora para saber cuantos años tiene, cuantos meses an pasado...
     * @return $edad -> y, - retornamos los años de diferencia (los años que tiene la persona)
     */
    public function calculate_age()
    {
        // Formateamos la cadena a tipo Date con el formato día/mes/año
        $fechaNacimiento = DateTime::createFromFormat('d/m/Y', $this->fNacimiento);

        // Creamos una variable que almacena la fecha actual
        $hoy = new DateTime();

        // Calculamos la edad usando el método diff de DateTime || diff -> Devuelve la diferencia entre dos objetos DateTime
        $edad = $hoy->diff($fechaNacimiento);

        // Devolvemos solo el componente de años de la diferencia (y) || y -> year, m -> month, d -> day
        return $edad->y;
    }

    /**
     * Funcion para cambiar un string por otro
     * @param string $string - string al que le queremos reemplazar texto
     * @param string $From - texto que queremos cambiar
     * @param string $To - texto al que queremos cambiar
     * $string_strtr - guardamos el string que nos retorna el metodo
     * @return - retornamos el string con el que hemos utilizado el strtr
     */
    function Strtr_function($string, $From, $To)
    {
        //Reemplazamos el contenido de el string a otro
        $string_strtr = strtr($string, [$From => $To]); // strtr: metodo para reemplazar una cadena de caracteres por otra

        /*
        //strtr con dos argumentos
        strtr($String, [$From_1 => $To_1], [$From_2 => $To_2])
        */

        return $string_strtr;
    }
}
