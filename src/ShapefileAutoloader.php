<?php
/***************************************************************************************************
Shapefile - PHP library to read any ESRI Shapefile and its associated DBF into a PHP Array, WKT or GeoJSON
    Author          : Gaspare Sganga
    Version         : 3dev
    License         : MIT
    Documentation   : https://gasparesganga.com/labs/php-shapefile/
****************************************************************************************************/

namespace Shapefile;

class ShapefileAutoloader
{
    public static function register()
    {
        spl_autoload_register('static::loadClass');
    }
    
    public static function loadClass($class)
    {
        $prefix     = __NAMESPACE__ . '\\';
        $base_dir   = __DIR__ . '/';
        $prefix_len = strlen($prefix);
        
        if (strncmp($prefix, $class, $prefix_len) !== 0) {
            return;
        }
        $file = $base_dir . str_replace('\\', '/', substr($class, $prefix_len)) . '.php';
        
        if (file_exists($file)) {
            require($file);
        }
    }
}