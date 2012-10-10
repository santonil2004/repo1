<?php
require 'config/paths.php';

/**
 * replace path
 * @param type $str
 * @return type 
 */
function process($str)
{
    switch ($str) {
        case 'controller':
            return 'controllers';
        case 'model':
            return 'models';
        /* for class inside the library.... */
        case 'Bootstrap':
            return 'library/Bootstrap';
        case 'Controller':
            return 'library/Controller';
        case 'Model':
            return 'library/Model';
        case 'View':
            return 'library/View';
        case 'Database':
            return 'library/Database';
        case 'Session':
            return 'library/Session';
        default:
            return $str;
            break;
    }
}

/**
 * modified print_r
 * @param type $var
 * @param type $title 
 */
function r($var, $title='')
{
    if ($title) {
        echo '<hr>' . $title . '<hr>';
    }
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

/**
 * auto including files
 * will be called when object will be created
 * @param type $classname 
 */
function __autoload($classname)
{
    $rawPath = explode('_', $classname);
    $path = array_map('process', $rawPath);
    $includePath = implode('/', $path) . '.php';

    if (file_exists($includePath)) {
        require $includePath;
    }
}

// initilize the framework


$Boot = new Bootstrap();
$Controller = new Controller();
$Model = new Model();
$View = new View();
$Session = new Session();

