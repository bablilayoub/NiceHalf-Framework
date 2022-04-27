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
namespace NicehalfCore\System\Views;

// USE CLASSES AND LIBRARIES
use Jenssegers\Blade\Blade;
use NicehalfCore\System\Extra\File;
use NicehalfCore\System\Sessions\Session;

// View Class
class View
{
    /**
     * View Constructor
     */
    private function __construct()
    {
    }

    /**
     * Render view file
     *
     * @param string $path
     * @param array $data
     * @return string
     */

    public static function render($path, $data = [])
    {
        $errors = Session::flash('errors');
        $old = Session::flash('old');
        $data = array_merge($data, ['errors' => $errors, 'old' => $old]);

        // YOU CAN USE bladeRender TO RENDER VIEWS OR YOU CAN USE viewRender FUNCTION TO RENDER VIEWS
        return static::bladeRender($path, $data);
    }

    /**
     * Render the view files using blade engine / advanced method
     *
     * @param string $path
     * @param array $data
     * @return string
     */

    public static function bladeRender($path, $data = [])
    {
        $blade = new Blade(File::path('application' . File::ds() .  'views'), File::path('storage' . File::ds() . 'cache'));

        return $blade->make($path, $data)->render();
    }

    /**
     * Render view file / basic method
     *
     * @param string $path
     * @param array $data
     * @return string
     */

    public static function viewRender($path, $data = [])
    {
        $path = 'application'  . File::ds() . 'views' . File::ds() . str_replace(['/', '\\', '.'], File::ds(), $path) . '.php';
        if (!File::exist($path)) {
            throw new \Exception("The view file {$path} is not exist");
        }

        ob_start();
        extract($data);
        include File::path($path);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
