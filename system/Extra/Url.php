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
namespace NicehalfCore\System\Extra;

// USE CLASSES AND LIBRARIES
use NicehalfCore\System\Http\Server;
use NicehalfCore\System\Http\Request;
 
// Url Class
class Url {
    /**
     * Url constructor
     */
    private function __construct() {}

    /**
     * Get the current url
     * 
     * @return string
     */

    public static function getCurrentUrl() {
        return Server::get('REQUEST_SCHEME') . '://' . Server::get('HTTP_HOST') . Server::get('REQUEST_URI');
    }

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

    /**
     * Redirect to previous page
     *
     * @return void
     */
    public static function back() {
        header('location: ' . static::previous());
        exit();
    }

    /**
     * Redirect to home page
     *
     * @return void
     */
    public static function home() {
        header('location: ' . Request::baseUrl());
        exit();
    }
}