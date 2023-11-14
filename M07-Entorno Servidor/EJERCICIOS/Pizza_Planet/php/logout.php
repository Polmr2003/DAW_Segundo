<?php
// importamos las classes con las funciones
require_once 'Funtions.php';

// iniciamos session
session_start();

// borramos las variables de session
remove_var_session();

// borramos la session
remove_session();

// redireccionamos a la paguina de login
header('Location: Login.php');
