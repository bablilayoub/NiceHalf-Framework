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
namespace NicehalfCore\System\Cookies;

// Cookie Class
class Cookie
{
    /**
     * Cookie constructor
     *
     */
    private function __construct()
    {
    }

    /**
     * Set new cookie
     *
     * @param string $key
     * @param string $value
     * @param int $expire
     * @return string $value
     */
    public static function set($key, $value, $expire = null)
    {
        if ($expire == null) {
            $expire = time() + (60 * 60 * 24 * 30);
        }

        setcookie($key, $value, $expire, '/');

        return $value;
    }


    /**
     * Check that cookie has the key
     *
     * @param string $key
     *
     * @return bool
     */
    public static function has($key)
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
    public static function get($key)
    {
        return static::has($key) ? $_COOKIE[$key] : null;
    }

    /**
     * Delete cookie by the given key
     *
     * @param string $key
     * @return void
     */
    public static function delete($key)
    {
        unset($_COOKIE[$key]);
        setcookie($key, null, '-1', '/');
    }

    /**
     * Return all cookies
     *
     * @return array
     */
    public static function all()
    {
        return $_COOKIE;
    }

    /**
     * Destroy the cookie
     *
     * return void
     */
    public static function destroy()
    {
        foreach (static::all() as $key => $value) {
            static::delete($key);
        }
    }
}
