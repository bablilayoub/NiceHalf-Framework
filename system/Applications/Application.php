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
use NicehalfCore\System\Route;
use NicehalfCore\System\Extra\File;
use NicehalfCore\System\Http\Request;
use NicehalfCore\System\Http\Response;
use NicehalfCore\System\Exeptions\Whoops;
use NicehalfCore\System\Sessions\Session;

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
