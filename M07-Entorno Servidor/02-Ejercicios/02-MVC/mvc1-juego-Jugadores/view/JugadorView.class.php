<?php
class JugadorView {
    
    public function __construct() {

    }


    //aquest mètode sempre el crearem així, amb les dues variables amb un valor de null per defecte
    public function display($template=NULL, $content=NULL) {
       
//$template es fa servir per incloure "coses" al body d'index.php. Per exemple, per incloure un formulari
//$content ens servirà per imprimir llistats d'objectes dins d'un bucle per formatat


        //incloem el menú que ens interessa dels dos que tenim.
        include("view/menu/MainMenu.html");
       
               


       if (!empty($template)) { //si rebem alguna cosa
            include($template); //simplement la incloem
        }
        
        //sempre incloim una zona de missatgeria
        include("view/form/JugadorForm/MessageForm.php");
    }


    public function displaySearch($template=NULL, $content=NULL) {

//$template es fa servir per incloure "coses" al body d'index.php. Per exemple, per incloure un formulari
//$content ens servirà per imprimir llistats d'objectes dins d'un bucle per formatat





        if (!empty($template)) { //si rebem alguna cosa
            include($template); //simplement la incloem
        }

        //sempre incloim una zona de missatgeria
        include("view/form/JugadorForm/MessageForm.php");
    }
}
