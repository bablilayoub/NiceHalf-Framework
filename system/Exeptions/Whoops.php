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
namespace NicehalfCore\System\Exeptions;

// USE CLASSES AND LIBRARIES
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

// Whoops Class
class Whoops
{
    // Whoops Constructor
    public function __construct()
    {
    }

    // Register Whoops
    public static function register()
    {
        $exeption = new Run;
        $exeption->pushHandler(new PrettyPageHandler);
        $exeption->register();
    }
}
