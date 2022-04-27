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

// Messages Class
class Messages
{
    /**
     * Messages constructor
     */
    private function __construct()
    {
    }

    /**
     * Set error message using bootstrap
     * @param string $message
     * @return string
     */

    public static function error($message)
    {
        return '<div class="alert alert-danger">' . $message . '</div>';
    }

    /**
     * Set success message using bootstrap
     * @param string $message
     * @return string
     */

    public static function success($message)
    {
        return '<div class="alert alert-success">' . $message . '</div>';
    }

    /**
     * Set info message using bootstrap
     * @param string $message
     * @return string
     */

    public static function info($message)
    {
        return '<div class="alert alert-info">' . $message . '</div>';
    }

    /**
     * Set warning message using bootstrap
     * @param string $message
     * @return string
     */

    public static function warning($message)
    {
        return '<div class="alert alert-warning">' . $message . '</div>';
    }
}
