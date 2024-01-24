<?php
//____________________________________________________________________ Form valiation dinamic ________________________________________________________________________
/*
Programa para validar los campos de un fomrulario

-Explicacion: https://www.phptutorial.net/php-tutorial/php-validation/
*/ 

//array con los datos
const DEFAULT_VALIDATION_ERRORS = [
    'required' => 'Please enter the %s',
    'email' => 'The %s is not a valid email address',
    'min' => 'The %s must have at least %s characters',
    'max' => 'The %s must have at most %s characters',
    'between' => 'The %s must have between %d and %d characters',
    'same' => 'The %s must match with %s',
    'alphanumeric' => 'The %s should have only letters and numbers',
    'secure' => 'The %s must have between 8 and 64 characters and contain at least one number, one upper case letter, one lower case letter and one special character',
    'unique' => 'The %s already exists',
];

// Array con las reglas de validacion
$fields = [
    'firstname' => 'required, max:255',
    'lastname' => 'required, max: 255',
    'address' => 'required | min: 10, max:255',
    'zipcode' => 'between: 5,6',
    'username' => 'required | alphanumeric | between: 3,255 | unique: users,username',
    'email' => 'required | email | unique: users,email',
    'password' => 'required | secure',
    'password2' => 'required | same:password'
];

/**
 * Validate
 * @param array $data
 * @param array $fields
 * @param array $messages
 * @return array
 */
function validate(array $data, array $fields, array $messages = []): array
{
    // Split the array by a separator, trim each element
    // and return the array
    $split = fn($str, $separator) => array_map('trim', explode($separator, $str));

    // get the message rules
    $rule_messages = array_filter($messages, fn($message) =>  is_string($message));
    
    // overwrite the default message
    $validation_errors = array_merge(DEFAULT_VALIDATION_ERRORS, $rule_messages);

    $errors = [];

    foreach ($fields as $field => $option) {

        $rules = $split($option, '|');

        foreach ($rules as $rule) {
            // get rule name params
            $params = [];
            // if the rule has parameters e.g., min: 1
            if (strpos($rule, ':')) {
                [$rule_name, $param_str] = $split($rule, ':');
                $params = $split($param_str, ',');
            } else {
                $rule_name = trim($rule);
            }
            // by convention, the callback should be is_<rule> e.g.,is_required
            $fn = 'is_' . $rule_name;

            if (is_callable($fn)) {
                $pass = $fn($data, $field, ...$params);
                if (!$pass) {
                    // get the error message for a specific field and rule if exists
                    // otherwise get the error message from the $validation_errors
                    $errors[$field] = sprintf(
                        $messages[$field][$rule_name] ?? $validation_errors[$rule_name],
                        $field,
                        ...$params
                    );
                }
            }
        }
    }

    return $errors;
}
