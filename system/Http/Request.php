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

// Request Class
class Request
{
    /**
     * Script name
     *
     * @var $script_name
     */
    private static $script_name;

    /**
     * Base url
     *
     * @var $base_url
     */
    private static $base_url;

    /**
     * Url
     *
     * @var $url
     */
    private static $url;

    /**
     * Full url
     *
     * @var $full_url
     */
    private static $full_url;

    /**
     * Query string
     *
     * @var $query_string
     */
    private static $query_string;

    /**
     * Request constructor
     *
     * @return void
     */
    private function __construct()
    {
    }

    /**
     * Handle the request
     *
     * @return void
     */
    public static function handle()
    {
        // GET SCRIPT NAME
        $getScriptName = str_replace('\\', '', dirname(Server::get('SCRIPT_NAME')));
        
        // IF SCRIPT NAME CONTAINS /public OR remove /public
        if (stristr($getScriptName, '/public') == TRUE) {
            $getScriptName = str_replace('/public', '', $getScriptName);
        }
        
        static::$script_name = $getScriptName;
        static::setBaseUrl();
        static::setUrl();
    }

    /**
     * Set base url
     *
     * @return void
     */
    private static function setBaseUrl()
    {
        $protocol = Server::get('REQUEST_SCHEME') . '://';

        $host = Server::get('HTTP_HOST');

        $script_name = static::$script_name;

        static::$base_url = $protocol . $host . $script_name;
    }

    /**
     * Set url
     *
     * @return void
     */
    private static function setUrl()
    {
        $request_uri = urldecode(Server::get('REQUEST_URI'));
        $request_uri = rtrim(preg_replace("#^" . static::$script_name . '#', '', $request_uri), '/');

        $query_string = '';

        static::$full_url = $request_uri;
        if (strpos($request_uri, '?') !== false) {
            list($request_uri, $query_string) = explode('?', $request_uri);
        }

        static::$url = $request_uri ?: '/';
        static::$query_string = $query_string;
    }

    /**
     * Get base url
     *
     * @return string
     */
    public static function baseUrl()
    {
        return static::$base_url;
    }

    /**
     * Get url
     *
     * @return string
     */
    public static function url()
    {
        return static::$url;
    }

    /**
     * Get query string
     *
     * @return string
     */
    public static function query_string()
    {
        return static::$query_string;
    }

    /**
     * Get full url
     *
     * @return string
     */
    public static function full_url()
    {
        return static::$full_url;
    }

    /**
     * Get request method
     *
     * @return string
     */
    public static function method()
    {
        return Server::get('REQUEST_METHOD');
    }

    /**
     * Check that the request has the key
     *
     * @param array $type
     * @param string $key
     * @return bool
     */
    public static function has($type, $key)
    {
        return array_key_exists($key, $type);
    }

    /**
     * get the value from the request
     *
     * @param string $key
     * @param array $type
     * @return bool
     */
    public static function value($key, array $type = null)
    {
        $type = isset($type) ? $type : $_REQUEST;
        return static::has($type, $key) ? $type[$key] : null;
    }

    /**
     * Get value from get request
     *
     * @param string $key
     * @return string $value
     */
    public static function get($key)
    {
        return static::value($key, $_GET);
    }

    /**
     * Get value from post request
     *
     * @param string $key
     * @return string $value
     */
    public static function post($key)
    {
        return static::value($key, $_POST);
    }

    /**
     * Set value for request by the given key
     *
     * @param string $key
     * @param string $value
     * @return string $value
     */
    public static function set($key, $value)
    {
        $_REQUEST[$key] = $value;
        $_POST[$key] = $value;
        $_GET[$key] = $value;

        return $value;
    }

    /**
     * Get previous request value
     *
     * @return string
     */
    public static function previous()
    {
        return Server::get('HTTP_REFERER');
    }

    /**
     * Get all requests
     *
     * @return array
     */
    public static function all()
    {
        return $_REQUEST;
    }

    /**
     * Get all get requests
     *
     * @return array
     */
    public static function all_get()
    {
        return $_GET;
    }

    /**
     * Get all post requests
     *
     * @return array
     */
    public static function all_post()
    {
        return $_POST;
    }

    /**
     * Get all files
     *
     * @return array
     */
    public static function all_files()
    {
        return $_FILES;
    }

    /**
     * Get file by the given key
     *
     * @param string $key
     * @return array
     */
    public static function file($key)
    {
        return static::has($_FILES, $key) ? $_FILES[$key] : null;
    }

    /**
     * Get all cookies
     *
     * @return array
     */
    public static function all_cookies()
    {
        return $_COOKIE;
    }

    /**
     * Check that cookie has the key
     *
     * @param string $key
     *
     * @return bool
     */
    public static function has_cookie($key)
    {
        return isset($_COOKIE[$key]);
    }

    /**
     * Get cookie by the given key
     *
     * @param string $key
     *
     * @return mixed
     */
    public static function cookie($key)
    {
        return static::has_cookie($key) ? $_COOKIE[$key] : null;
    }
}
