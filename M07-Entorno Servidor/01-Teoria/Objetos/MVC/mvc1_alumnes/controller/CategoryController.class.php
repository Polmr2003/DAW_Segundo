<?php
//crido tot el que necessitaré fer servir

require_once "controller/ControllerInterface.php";
require_once "view/CategoryView.class.php";
require_once "model/persist/CategoryDAO.class.php";
require_once "model/Category.class.php";
require_once "util/CategoryMessage.class.php";
require_once "util/CategoryFormValidation.class.php";

class CategoryController implements ControllerInterface {

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
        $this->view=new CategoryView();

        // càrrega del model de dades
        $this->model=new CategoryDAO();
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
     * Aquest mètode ens mostra totes les categories
     * @param none
     * @return none
    **/
    
    public function listAll() {
       //to do
    }
  
    /**
     * Aquest mètode ens mostra totes les categories
     * @param none
     * @return none
    **/
    public function formAdd() {
        //to do
     }

    /**
     * Aquest mètode ens afegeix la categoria al fitxer
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
