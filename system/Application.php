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

// USE CLASSES AND LIBRARIES
use NicehalfCore\System\File;
use NicehalfCore\System\Route;
use NicehalfCore\System\Whoops;
use NicehalfCore\System\Request;
use NicehalfCore\System\Session;
use NicehalfCore\System\Response;

// Application Class
class Application
{
    // Application Constructor
    private function __construct()
    {
    }

    // Run the application
    public static function run()
    {
        // ROOT PATH
        define('ROOT', realpath(__DIR__ . '/../'));

        // DERECTORY SEPARATOR
        define('DS', DIRECTORY_SEPARATOR);

        // SETUP ERROR HANDLER
        Whoops::register();

        // Start session
        Session::start();

        // Handle the request
        Request::handle();

        // Require all routes directory
        File::require_directory('/application/routes');

        // Handle the route
        $data = Route::handle();

        // Output the response
        Response::output($data);
    }
}
