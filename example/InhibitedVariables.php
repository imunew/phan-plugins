<?php

namespace Example;

/**
 * Class InhibitedVariables
 * @package Example
 */
class InhibitedVariables
{
    public function accessSuperGlobals()
    {
        return $GLOBALS['something'] ?? 'Do not access super globals directly.';
    }
}
