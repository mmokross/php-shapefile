<?php
/***************************************************************************************************
Shapefile - PHP library to read any ESRI Shapefile and its associated DBF into a PHP Array, WKT or GeoJSON
    Author          : Gaspare Sganga
    Version         : 3dev
    License         : MIT
    Documentation   : https://gasparesganga.com/labs/php-shapefile/
****************************************************************************************************/

namespace Shapefile;

class ShapefileException extends \Exception
{    
    public function getErrorType()
    {
        $ret        = null;
        $code       = $this->getCode();
        $Reflection = new \ReflectionClass('\Shapefile\Shapefile');
        foreach ($Reflection->getConstants() as $name => $value) {
            if ($value == $code && substr($name, 0, 4) == 'ERR_') {
                $ret = $name;
                break;
            }
        }
        return $ret;
    }
}