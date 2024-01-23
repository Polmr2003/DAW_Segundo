<?php
//crido de manera general tot el que necessitaré cridar

use persist\UsersDAO;

require_once "controller/ControllerInterface.php";
require_once "view/UsersView.class.php";
require_once "model/users/persist/UsersDAO.class.php";
require_once "model/users/Users.class.php";
require_once "util/users/UsersMessage.class.php";
require_once "util/users/UsersFormValidation.class.php";

require_once "util/Funciones_importantes/funcions_archivos.php";
require_once "util/Funciones_importantes/funcions_array.php";
class UsersController implements ControllerInterface
{

    //atributs que segur que tindran tots els controladors
    private $view;
    private $model;

    //constructor del controlador. Instancia objectes de les classes de la vista i el model necessàries per poder 
    //comunicar aquest controlador amb la resta

    public function __construct()
    {

        // càrrega de la vista
        $this->view = new usersView();



        // càrrega del model de dades
        $this->model = new usersDAO();
    }

    // aquest mètode el tenen tots els nostres controladors
    // serveix per saber en quin lloc del menú estem

    public function processRequest()
    {

        //inicialitzem 3 variables que necessitarem
        $request = NULL; //aquest NULL serveix per al cas que sigui la primera vegada que hi entrem, sinó valdrà $_POST["action"] o $_GET["option"]
        $_SESSION['info'] = array(); //per donar sortida a tots els missatges generals d'informació
        $_SESSION['error'] = array(); ////per donar sortida a tots els missatges d'error

        // recupera l'acció SI VENIM DES D'UN FORMULARI --> PER POST, o bé
        // recupera l'opció SI VENIM D'UNA OPCIÓ DEL MENÚ--> PER GET
        //només hi pot haver una d'aquestes dues situacions,


        $request = isset($_POST["action"]) ? $_POST["action"] : NULL;
        if (isset($_POST["action"])) {
            $request = $_POST["action"];
        } else if (isset($_GET["option"])) {
            $request = $_GET["option"];
        }


        //mirem totes les opcions d'action o d'option ASSIGNADES a la variable $request
        switch ($request) {
            case "login": //opció de menu que trobem a MainMenu.html, menú de la vista que carreguem el primer cop amb el display
                $this->login();
                break;

            case "submit": //opció de menu que trobem a MainMenu.html, menú de la vista que carreguem el primer cop amb el display
                $this->login_btn();
                break;

            case "home_login": //opció de menu que trobem a MainMenu.html, menú de la vista que carreguem el primer cop amb el display
                $this->home();
                break;

            case "logout": //opció de menu que trobem a MainMenu.html, menú de la vista que carreguem el primer cop amb el display
                $this->logout();
                break;

            default: //en el cas que vinguem per primer cop a categories o no haguem escollit res de res, $request=NULL;
                $this->login();
                break;
        }
    }

    //carrega el llistat de totes les categories
    public function home()
    {
        //mostramos la home
        $this->view->displayLoggedIn("view/options/home/UsersHome.php");
    }


    //carrega el llistat de totes les categories
    public function login()
    {
        //mostramos el login
        $this->view->display("view/options/login/login.php");
    }

    public function logout()
    {
        //mostramos el logout
        $this->view->display("view/options/logout/Logout.php");
    }

    public function login_btn()
    {
        // ruta del archivo donde estan los usuarios validos
        $csvFile = 'model/users/resources/users.csv';

        // variables donde almacenamos el usuario i el password
        $username = '';
        $password = '';

        $loggedIn = '';
        $mensaje = '';

        $_SESSION["loggedIn"]="";
        //si estamos logeados
        if ($_SESSION["loggedIn"]) {
            //mostramos el menu de los usuarios logeados
            $this->view->displayLoggedIn("view/options/home/UsersHome/usersHome.php");
        } else {
            //si no estamos logeados

            //miramos que nos venga de el metodo post
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['id'] ?? '';
                $password = $_POST['password'] ?? '';
            }

            // comprovamos las credenciales
            if ($username && $password) {
                $loggedIn = $this->model->login($username, $password, $csvFile);
            } else {
                $_SESSION['error'] = usersMessage::ERR_FORM['empty_id'];
                $_SESSION['error'] = usersMessage::ERR_FORM['empty_password'];
            }

            if ($loggedIn) {
                $_SESSION["loggedIn"] = true;
                // creamos la variable de session de el nombre de usuario
                $_SESSION["user"] = $username;

                // creamos la variable de session de el rol de el usuario
                if ($username == "user1") {
                    $_SESSION["Rol"] = "admin";
                } else {
                    $_SESSION["Rol"] = "basic";
                }
                //mostramos el menu de los usuarios logeados
                $this->view->displayLoggedIn("view/options/home/usersHome.php");
            } else {
                // si ponemos mal las credenciales nos aparecera el mensaje de invalid_user
                $_SESSION['error'] = usersMessage::ERR_FORM['invalid_user'];
                $this->view->display("view/options/login/login.php"); //li passem la variable que es diu $template a la vista usersView.class.php
            }
        }
    }

    //carrega el llistat de totes les categories
    public function ejer1()
    {

    }


    // carrega el formulari d'insertar categoria
    public function formAdd()
    {
        $this->view->displayLoggedIn("view/options/home/UsersHome.php");
    }

    // ejecuta la acción de insertar categoría
    public function add()
    {
        //validem i omplim missatges d'error, si n'hi hagués
        $usersValid = usersFormValidation::checkData(usersFormValidation::ADD_FIELDS);

        //si no hi ha declarat cap sessió d'error
        if (empty($_SESSION['error'])) {
            //busco per id, a veure si n'hi ha un altre d'igual
            $users = $this->model->searchById($usersValid->getId());

            //si no hem trobat l'id...
            if ($users == null) {
                //afegim la categoria a l'arxiu
                $result = $this->model->add($usersValid);

                if ($result == TRUE) {
                    $_SESSION['info'] = usersMessage::INF_FORM['insert'];
                    $usersValid = NULL;
                }
            } else {
                $_SESSION['error'] = usersMessage::ERR_FORM['exists_id'];
            }
        }

        $this->view->display("view/form/usersForm/usersFormAdd.php", $usersValid);
    }

    //aquests mètodes els deixem ara per ara així
    public function modify()
    {
        //validem i omplim missatges d'error, si n'hi hagués
        $usersValid = usersFormValidation::checkData(usersFormValidation::MODIFY_FIELDS);


        //si no hi ha declarat cap sessió d'error
        if (empty($_SESSION['error'])) {
            $searchID = $this->model->searchByIdModify($usersValid->getId());


            $getName = $usersValid->getNombre();

            if ($searchID) {
                $product = [$searchID, $getName];

                $this->model->modify($product);
                $_SESSION['info'] = usersMessage::INF_FORM['update'];
            } else {
                $_SESSION['error'] = usersMessage::ERR_FORM['not_exists_id'];
            }
        }

        $this->view->display("view/form/usersForm/usersFormModify.php");
    }
    public function delete()
    {
        //validem i omplim missatges d'error, si n'hi hagués
        $usersValid = usersFormValidation::checkData(usersFormValidation::DELETE_FIELDS);


        //si no hi ha declarat cap sessió d'error
        if (empty($_SESSION['error'])) {
            $searchID = $this->model->searchByIdModify($usersValid->getId());

            if ($searchID != -1) {

                $this->model->delete($searchID);
                $_SESSION['info'] = usersMessage::INF_FORM['delete'];
            } else {
                $_SESSION['error'] = usersMessage::ERR_FORM['not_exists_id'];
            }
        }

        $this->view->display("view/form/ProductForm/ProductFormDelete.php");
    }
    public function searchById()
    {
        //validem i omplim missatges d'error, si n'hi hagués
        $usersValid = usersFormValidation::checkData(usersFormValidation::SEARCH_FIELDS);

        $this->view->display("view/form/usersForm/usersFormSearch.php");

        $searchID = $this->model->searchById($usersValid->getId());


        //si no hi ha declarat cap sessió d'error
        if ($searchID) {

            if (!empty($searchID)) { // array void or array of Products objects?
                $_SESSION['info'] = usersMessage::INF_FORM['found'];
                $this->view->displaySearch("view/form/usersForm/usersHome.php", $searchID);
            } else {
                $_SESSION['error'] = usersMessage::ERR_FORM['not_found'];
            }
        } else {
            $_SESSION['error'] = usersMessage::ERR_FORM['not_found'];
        }
    }
    /*
    // carregaria el formulari de modificar si el programessim al menú  
    public function formModify() {
        $this->view->display("view/form/CategoryForm/CategoryFormModify.php");
    }    

    // executaria la modificació si el programessim al menú 
    public function modify() {
        $categoryValid=CategoryFormValidation::checkData(CategoryFormValidation::MODIFY_FIELDS);        
        
        if (empty($_SESSION['error'])) {
            $category=$this->model->searchById($categoryValid->getId());

            if (!is_null($category)) {            
                $result=$this->model->modify($categoryValid);

                if ($result == TRUE) {
                    $_SESSION['info']=CategoryMessage::INF_FORM['update'];
                }
            }
            else {
                $_SESSION['error']=CategoryMessage::ERR_FORM['not_exists_id'];
            }
        }
        
        $this->view->display("view/form/CategoryForm/CategoryFormModify.php", $categoryValid);
    }

    // ejecuta la acción de eliminar categoría    
    public function delete() {
        $categoryValid=CategoryFormValidation::checkData(CategoryFormValidation::DELETE_FIELDS);
        
        if (empty($_SESSION['error'])) {
            $category=$this->model->searchById($categoryValid->getId());

            if (!is_null($category)) {            
                $result=$this->model->delete($categoryValid->getId());

                if ($result == TRUE) {
                    $_SESSION['info']=CategoryMessage::INF_FORM['delete'];
                    $categoryValid=NULL;
                }
            }
            else {
                $_SESSION['error']=CategoryMessage::ERR_FORM['not_exists_id'];
            }
        }
        
        $this->view->display("view/form/CategoryForm/CategoryFormModify.php", $categoryValid);
    }

    
    

    // ejecuta la acción de buscar categoría por id de categoría
    public function searchById() {
        $categoryValid=CategoryFormValidation::checkData(CategoryFormValidation::SEARCH_FIELDS);
        
        if (empty($_SESSION['error'])) {
            $category=$this->model->searchById($categoryValid->getId());

            if (!is_null($category)) { // is NULL or Category object?
                $_SESSION['info']=CategoryMessage::INF_FORM['found'];
                $categoryValid=$category;
            }
            else {
                $_SESSION['error']=CategoryMessage::ERR_FORM['not_found'];
            }
        }
            
        $this->view->display("view/form/CategoryForm/CategoryFormModify.php", $categoryValid);
    }    

    // carga el formulario de buscar productos por nombre de categoría
    public function formListProducts() {
        $this->view->display("view/form/CategoryForm/CategoryFormSearchProduct.php");
    }    
    
    // ejecuta la acción de buscar productos por nombre de categoría
    public function listProducts() {
        $name=trim(filter_input(INPUT_POST, 'name'));

        $result=NULL;
        if (!empty($name)) { // Category Name is void?
            $result=$this->model->listProducts($name);            

            if (!empty($result)) { // array void or array of Product objects?
                $_SESSION['info']="Data found"; 
            }
            else {
                $_SESSION['error']=CategoryMessage::ERR_FORM['not_found'];
            }
            
            $this->view->display("view/form/CategoryForm/CategoryListProduct.php", $result);
        }
        else {
            $_SESSION['error']=CategoryMessage::ERR_FORM['invalid_name'];
            
            $this->view->display("view/form/CategoryForm/CategoryFormSearchProduct.php", $result);
        }
    }
    */
}
