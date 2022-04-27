<?php

/**
 * NiceHalf Core 
 * 
 * @author NiceHalf (Ayoub Bablil)
 * 
 * @version 1.0
 * 
 * @package NiceHalf Core
 */

// NAMESPACE
namespace NicehalfCore\System\Validations;

// USE LIBRARIES AND CLASSES
use Rakit\Validation\Validator;
use NicehalfCore\System\Session;
use NicehalfCore\System\Extra\Url;
use NicehalfCore\System\Http\Request;
use NicehalfCore\System\Rules\UniqueRule;

// Vlidate Class
class Validate
{
    /**
     * Validation constructor
     */
    private function __construct()
    {
    }

    /**
     * Validate request
     *
     * @param array $rules
     * @param bool $json
     *
     * @return mixed
     */
    public static function validate(array $rules, $json)
    {
        $validator = new Validator;

        $validator->addValidator('unique', new UniqueRule());
        $validation = $validator->validate($_POST + $_FILES, $rules);
        $errors = $validation->errors();

        if ($validation->fails()) {
            if ($json) {
                return ['errors' => $errors->firstOfAll()];
            } else {
                Session::set('errors', $errors);
                Session::set('old', Request::all());
                return Url::redirect(Url::previous());
            }
        }
    }
}
