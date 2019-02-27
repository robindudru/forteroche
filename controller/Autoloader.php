<?php
/**
 * Autoloads every classes to avoid multiple requires.
 *
 * @package    Forteroche
 * @author     Robin Dupont-Druaux <contact@robindupontdruaux.fr>
 */

class Autoloader
{
    /**
    * Registers every classes gathered from autoload method
    */
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    /**
     * Sets path where classes files can be found
     */
    public static function autoload($class)
    {
        $class = str_replace("\\", '/', $class);
        require_once './' . $class . '.php';
    }
}