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

/**
 *  View Render
 *  @param string $path
 *  @param array $data
 *  @return mixed
 */

if (!function_exists('view')) {
    function view($path, $data = [])
    {
        if (!$path)
            return false;
        return NicehalfCore\System\Views\View::render($path, $data);
    }
}


/**
 * Get Request
 * @param string $key
 * @return mixed
 */

if (!function_exists('request')) {
    function request($key = null)
    {
        return NicehalfCore\System\Http\Request::value($key);
    }
}

/**
 * Redirect
 * @param string $path
 * @return mixed
 */

if (!function_exists('redirect')) {
    function redirect($path)
    {
        if (!$path)
            return false;
        return NicehalfCore\System\Extra\Url::redirect($path);
    }
}

/**
 * Previous URL
 * @return mixed
 */

if (!function_exists('previous')) {
    function previous()
    {
        return NicehalfCore\System\Extra\Url::previous();
    }
}


/**
 * Url Path
 * @param string $path
 * @return mixed
 */

if (!function_exists('url')) {
    function url($path = null)
    {
        return NicehalfCore\System\Extra\Url::path($path);
    }
}

/**
 * Asset Path
 * @param string $path
 * @return mixed
 */

if (!function_exists('asset')) {
    function asset($path = null)
    {
        return NicehalfCore\System\Extra\Url::path($path);
    }
}

/**
 * Dump and die
 *
 * @param string $data
 * @return void
 */

if (!function_exists('dd')) {
    function dd($data)
    {
        echo "<pre>";
        if (is_string($data)) {
            echo $data;
        } else {
            print_r($data);
        }
        echo "</pre>";
        die();
    }
}

/**
 * Get session value
 * @param string $key
 * @return mixed
 */

if (!function_exists('session')) {
    function session($key = null)
    {
        return NicehalfCore\System\Sessions\Session::get($key);
    }
}

/**
 * Get session flash value
 * @param string $key
 * @return mixed
 */

if (!function_exists('flash')) {
    function flash($key = null)
    {
        return NicehalfCore\System\Sessions\Session::flash($key);
    }
}

/**
 * Show pagination links
 * @param string $current_page
 * @param string $pages
 * @return string
 */

if (!function_exists('paginate')) {
    function paginate($current_page, $pages)
    {
        if (!$current_page || !$pages)
            return false;
        return NicehalfCore\System\Database\Database::links($current_page, $pages);
    }
}

/**
 * Table auth
 * @param string $table
 * @param string $column
 * @param string $value
 * @return mixed
 */

if (!function_exists('auth')) {
    function auth($table)
    {
        if (!$table)
            return false;
        $auth = NicehalfCore\System\Sessions\Session::get($table) ?: NicehalfCore\System\Cookies\Cookie::get($table);
        return \NicehalfCore\System\Database\Database::table($table)->where('id', '=', $auth)->first();
    }
}
