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
namespace NicehalfCore\System;

// USE CLASSES AND LIBRARIES
use NicehalfCore\System\Server;
use NicehalfCore\System\Request;
 
// Url Class
class Url {
    /**
     * Url constructor
     */
    private function __construct() {}

    /**
     * Get path
     *
     * @param string $path
     * @return string $path
     */
    public static function path($path) {
        return Request::baseUrl() . '/' . trim($path, '/');
    }

    /**
     * Previous url
     *
     * @return string
     */
    public static function previous() {
        return Server::get('HTTP_REFERER');
    }

    /**
     * Redirect to page
     *
     * @return void
     */
    public static function redirect($path) {
        header('location: ' . $path);
        exit();
    }
}