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
}
