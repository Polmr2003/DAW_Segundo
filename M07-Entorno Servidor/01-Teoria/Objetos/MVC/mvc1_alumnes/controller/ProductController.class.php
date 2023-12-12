<?php
//crido de manera general tot el que necessitaré cridar

//to do

require_once "";
require_once "";
require_once "";
require_once "";
require_once "";
require_once "";

class ProductController implements ControllerInterface {

    //atributs que segur que tindran tots els controladors
    private $view;
    private $model;

    //constructor del controlador. Instancia objectes de les classes de la vista i el model necessàries per poder 
    //comunicar aquest controlador amb la resta
 /**
     * Constructor del controlador. Instancia objectes de les classes de la vista i el model 
     * que són necessaris per poder comunicar aquest controlador amb la resta de l'aplicació
     * @param none
     * @return none
    **/
    public function __construct() {

        // càrrega de la vista
        //$this->view=new ProductView();

        // càrrega del model de dades
        //$this->model=new ProductDAO();
    }

   
   /**
     * Aquest mètode el tenen tots els nostres controladors
     * Serveix per saber què fer per cada opció demanada per l'usuari: llistar, afegir, eliminar,...
     * @param none
     * @return none
    **/
    public function processRequest() {
        
        //to do
    }

    /**
     * Aquest mètode ens mostra tots els productes
     * @param none
     * @return none
    **/
    
    public function listAll() {
       //to do
    }
  
    /**
     * Aquest mètode ens mostra el formulari necessari per afegir un nou 
     * producte
     * @param none
     * @return none
    **/
    public function formAdd() {
        //to do
     }

    /**
     * Aquest mètode ens afegeix el producte al fitxer
     * @param none
     * @return none
    **/
    public function add() {
        //to do
    }

    //altres mètodes necessaris: to do
    public function modify(){
        //to do
    }
    public function delete(){
        //to do
    }
    public function searchById(){
        //to do
    }
  
}
