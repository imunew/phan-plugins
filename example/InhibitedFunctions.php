<?php

namespace Example;

/**
 * Class InhibitedFunctions
 * @package Example
 */
class InhibitedFunctions
{
    public function extract()
    {
        $vars = [
            "color" => "blue",
            "size"  => "medium",
            "shape" => "sphere"
        ];
        extract($vars);

        echo "$color, $size, $shape\n";
    }
}
