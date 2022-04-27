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

// Response Class
class Response
{
    /**
     * Response constructor
     *
     *
     */
    private function __construct()
    {
    }

    /**
     * Return json respoonse
     *
     * @params mixed $data
     * @return mixed
     */
    public static function json($data)
    {
        return json_encode($data);
    }

    /**
     * Output data
     *
     * @param mixed $data
     */
    public static function output($data)
    {
        if (!$data) {
            return;
        }
        if (!is_string($data)) {
            $data = static::json($data);
        }
        echo $data;
    }

    /**
     * Set status code
     * - 200 OK
     * - 301 Moved Permanently
     * - 302 Found
     * - 303 See Other
     * - 304 Not Modified
     * - 307 Temporary Redirect
     * - 400 Bad Request
     * - 401 Unauthorized
     * - 403 Forbidden
     * - 404 Not Found
     * - 405 Method Not Allowed
     * - 500 Internal Server Error
     * - 503 Service Unavailable
     * - 504 Gateway Timeout
     * - 505 HTTP Version Not Supported
     * - 506 Variant Also Negotiates
     * - 507 Insufficient Storage
     * - 508 Loop Detected
     * - 510 Not Extended
     * - 511 Network Authentication Required
     * - you can find more status code in http://www.restapitutorial.com/httpstatuscodes.html
     */

    public static function status($code)
    {
        http_response_code($code);
    }

    /**
     * Set response header
     * @param string $header
     * @param string $value
     */
    public static function header($header, $value)
    {
        header($header . ': ' . $value);
    }
}
