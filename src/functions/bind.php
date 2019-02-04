<?php

namespace FPPHP\Functions;
/**
 * 
 * bind: (* -> *) -> {*} -> (* -> *)
 * 
 * Returns a new function binded to the new context provided
 * 
 * @param callable $fn
 * @param mixed $arg1
 * @param mixed $arg2
 * @return callable
 * 
 */
function bind(mixed $newContext)
{
    return function (callable $fn) use ($newContext) {

        if (!\is_object($newContext)) return $fn;

        return (\Closure::fromCallable($fn))->bindTo($newContext);
    };
}
        