<?php

namespace App\Helpers;

/**
 * The class assumes working with
 * json format files
 */
class Json
{
    /**
     * Read json content
     */
    public static function read(string $path)
    {
        return json_decode(file_get_contents($path), true);
    }
}