<?php

namespace FPPHP\Functions;

/**
 * 
 * memoize: (* -> a) -> (* -> a)
 * 
 * Returns the memoized version of the function
 * 
 * @param callable $fn
 * @return callable
 * 
 */
function memoize(callable $fn)
{
    $memo = [];

    return function (...$args) use (&$memo, $fn) {

        $argsStr = \json_encode($args);

        if (array_key_exists($argsStr, $memo)) return $memo[$argsStr];

        $memo[$argsStr] = \call_user_func_array($fn, $args);

        return $memo[$argsStr];
    };
}
