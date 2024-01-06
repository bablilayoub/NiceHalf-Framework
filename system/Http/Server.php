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
namespace NicehalfCore\System\Http;

// Server Class
class Server
{
    /**
     * Server constructor
     *
     */
    private function __construct()
    {
    }

    /**
     * Check that server has the key
     *
     * @return bool
     */
    public static function has($key)
    {
        return isset($_SERVER[$key]);
    }

    /**
     * Get the value from server by the given key
     *
     * @param string $key
     * @return string $value
     */
    public static function get($key)
    {
        return static::has($key) ? $_SERVER[$key] : null;
    }

    /**
     * Get all server data
     *
     * @return array
     */
    public static function all()
    {
        return $_SERVER;
    }

    /**
     * Get path info for path
     *
     * @return array
     */
    public static function path_info($path)
    {
        return pathinfo($path);
    }

    /**
     * Get path info for request uri
     *
     * @return array
     */
    public static function request_path_info()
    {
        return static::path_info(static::get('REQUEST_URI'));
    }

    /**
     * Get path info for script name
     *
     * @return array
     */
    public static function script_path_info()
    {
        return static::path_info(static::get('SCRIPT_NAME'));
    }

    /**
     * Get path info for script name
     *
     * @return array
     */
    public static function base_path_info()
    {
        return static::path_info(static::get('SCRIPT_NAME'));
    }
}
