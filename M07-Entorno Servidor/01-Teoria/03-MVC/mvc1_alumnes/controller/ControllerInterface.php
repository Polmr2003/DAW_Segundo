<?php
/**
 * aquesta interfície fa una declaració dels mètodes que seran obligatoris 
 * de complir per tots els controladors que implementin aquesta interfície. 
*/
interface ControllerInterface {
   
    public function processRequest();
    public function add();
    public function modify();
    public function delete();
    public function searchById();
    public function listAll();
    
}
