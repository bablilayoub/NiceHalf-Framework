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
namespace NicehalfCore\System\Sessions;

// Session Class
class Session
{
    /**
     * Session constructor
     *
     */
    private function __construct()
    {
    }

    /**
     * Session start
     *
     * @return void
     */
    public static function start()
    {
        if (!session_id()) {
            ini_set('session.use_only_cookies', 1);
            session_start();
        }
    }

    /**
     * Set new session
     *
     * @param string $key
     * @param string $value
     *
     * @return string $value
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;

        return $value;
    }

    /**
     * Check that session has the key
     *
     * @param string $key
     *
     * @return bool
     */
    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Get session by the given key
     *
     * @param string $key
     *
     * @return mixed
     */
    public static function get($key)
    {
        return static::has($key) ? $_SESSION[$key] : null;
    }

    /**
     * Delete session by the given key
     *
     * @param string $key
     * @return void
     */
    public static function delete($key)
    {
        unset($_SESSION[$key]);
    }

    /**
     * Return all sessions
     *
     * @return array
     */
    public static function all()
    {
        return $_SESSION;
    }

    /**
     * Destroy the session
     *
     * return void
     */
    public static function destroy()
    {
        foreach (static::all() as $key => $value) {
            static::delete($key);
        }
    }

    /**
     * Get flash session
     *
     * @params string $key
     * @return string $value
     */
    public static function flash($key)
    {
        $value = null;
        if (static::has($key)) {
            $value = static::get($key);
            static::delete($key);
        }
        return $value;
    }
}
