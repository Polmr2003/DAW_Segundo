<?php

class ProductFormValidation
{

    const ADD_FIELDS = array('id', 'marca', 'nom', 'descripcio', 'preu');
    const MODIFY_FIELDS = array('id', 'marca', 'nom', 'descripcio', 'preu');
    const DELETE_FIELDS = array('id');
    const SEARCH_FIELDS = array('id');

    const NUMERIC = "/[^0-9]/";
    const ALPHABETIC = "/[^a-z A-Z]/";

    public static function checkData($fields)
    {
        $id = NULL;
        $marca = NULL;
        $nom = NULL;
        $descripcio = NULL;
        $preu = NULL;

        foreach ($fields as $field) {
            switch ($field) {
                case 'id':
                    // filter_var retorna los datos filtrados o FALSE si el filtro falla
                    $id = trim(filter_input(INPUT_POST, 'id'));
                    $idValid = !preg_match(self::NUMERIC, $id);
                    if (empty($id)) {
                        array_push($_SESSION['error'], ProductMessage::ERR_FORM['empty_id']);
                    } else if ($idValid == FALSE) {
                        array_push($_SESSION['error'], ProductMessage::ERR_FORM['invalid_id']);
                    }
                    break;
                case 'marca':
                    $marca = trim(filter_input(INPUT_POST, 'marca'));
                    $marcaValid = !preg_match(self::ALPHABETIC, $marca);
                    if (empty($marca)) {
                        array_push($_SESSION['error'], ProductMessage::ERR_FORM['empty_marca']);
                    } else if ($marcaValid == FALSE) {
                        array_push($_SESSION['error'], ProductMessage::ERR_FORM['invalid_marca']);
                    }
                    break;
                case 'nom':
                    $nom = trim(filter_input(INPUT_POST, 'nom'));
                    $nomValid = !preg_match(self::ALPHABETIC, $nom);
                    if (empty($nom)) {
                        array_push($_SESSION['error'], ProductMessage::ERR_FORM['empty_nom']);
                    } else if ($nomValid == FALSE) {
                        array_push($_SESSION['error'], ProductMessage::ERR_FORM['invalid_nom']);
                    }
                    break;
                case 'descripcio':
                    $descripcio = trim(filter_input(INPUT_POST, 'descripcio'));
                    $descripcioValid = !preg_match(self::ALPHABETIC, $descripcio);
                    if (empty($descripcio)) {
                        array_push($_SESSION['error'], ProductMessage::ERR_FORM['empty_descripcio']);
                    } else if ($descripcioValid == FALSE) {
                        array_push($_SESSION['error'], ProductMessage::ERR_FORM['invalid_descripcio']);
                    }
                    break;
                case 'preu':
                    $preu = trim(filter_input(INPUT_POST, 'preu'));
                    $preuValid = !preg_match(self::NUMERIC, $preu);
                    if (empty($preu)) {
                        array_push($_SESSION['error'], ProductMessage::ERR_FORM['empty_preu']);
                    } else if ($preuValid == FALSE) {
                        array_push($_SESSION['error'], ProductMessage::ERR_FORM['invalid_preu']);
                    }
                    break;
            }
        }

        $category = new Product($id, $marca, $nom, $descripcio, $preu);

        return $category;
    }

}
