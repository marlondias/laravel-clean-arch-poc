<?php

namespace App\Repositories\Traits;

trait CachesMethodReturnsTrait
{
    /**
     * Generate a unique string for use as cache key.
     * If the method has arguments, it is recommended to create a string
     * that is unique for each variation of these arguments.
     *
     * @param string $methodName Name (only) of the method that is calling this one.
     * @param string $inputVariant Use if you need to differentiate the resulting key.
     * @return string
     */
    protected function getCacheKey(string $methodName, string $inputVariant = ''): string
    {
        $key = __CLASS__ . "::{$methodName}";
        if (!empty($inputVariant)) {
            $key .= "+{$inputVariant}";
        }
        return $key;
    }

}
