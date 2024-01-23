<?php

class usersFormValidation {

    const ADD_FIELDS = array('id','password');
    const MODIFY_FIELDS = array('id','name');
    const DELETE_FIELDS = array('id');
    const SEARCH_FIELDS = array('id');
    
    const NUMERIC = "/[^0-9]/";
    const ALPHABETIC = "/[^a-z A-Z]/";
    
    public static function checkData($fields) {
        $id=NULL;
        $password=NULL;
        
        foreach ($fields as $field) {
            switch ($field) {
                case 'id':
                    // filter_var retorna los datos filtrados o FALSE si el filtro falla
                    $id=trim(filter_input(INPUT_POST, 'id'));
                    $idValid=!preg_match(self::NUMERIC, $id);
                    if (empty($id)) {
                        array_push($_SESSION['error'], usersMessage::ERR_FORM['empty_id']);
                    }
                    else if ($idValid == FALSE) {
                        array_push($_SESSION['error'], usersMessage::ERR_FORM['invalid_id']);
                    }
                    break;
                case 'password':
                    $name=trim(filter_input(INPUT_POST, 'password'));
                    $nameValid=!preg_match(self::ALPHABETIC, $name);
                    if (empty($name)) {
                        array_push($_SESSION['error'], usersMessage::ERR_FORM['empty_password']);
                    }
                    else if ($nameValid == FALSE) {
                        array_push($_SESSION['error'], usersMessage::ERR_FORM['invalid_password']);
                    }
                    break;
            }
        }
        
        $user=new users($id, $password);
        
        return $user;
    }
    
}
