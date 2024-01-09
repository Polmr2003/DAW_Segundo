<?php
class Product
{

    private $id;
    private $marca;
    private $nom;
    private $descripcio;
    private $preu;
    private $productList = array(); // si el necessitessim en una posterior ampliació!

    public function __construct($id = NULL, $marca = NULL, $nom = NULL, $descripcio = NULL, $preu = NULL)
    {
        $this->id = $id;
        $this->marca = $marca;
        $this->nom = $nom;
        $this->descripcio = $descripcio;
        $this->preu = $preu;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getDescripcio()
    {
        return $this->descripcio;
    }

    public function setDescripcio($descripcio)
    {
        $this->descripcio = $descripcio;
    }

    public function getPreu()
    {
        return $this->preu;
    }

    public function setPreu($preu)
    {
        $this->preu = $preu;
    }

    public function getProductList()
    {
        return $this->productList;
    }

    public function setProductList($productList)
    {
        $this->productList[] = $productList;
    }

    public function writingNewLine()
    {
        return "\n$this->id;$this->marca;$this->nom;$this->descripcio;$this->preu;"; // podríem volem algun mètode extrar de la classe que ens fos interessant i general
    }

}
