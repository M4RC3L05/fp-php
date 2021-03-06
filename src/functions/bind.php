<?php

namespace FPPHP\Functions;
/**
 * 
 * bind: (* -> *) -> {*} -> (* -> *)
 * 
 * Returns a new function binded to the new context provided
 * 
 * @param mixed $newContext
 * @param callable $fn
 * @return callable
 * 
 */
function bind($newContext)
{
    return function (callable $fn) use ($newContext) {

        if (!\is_object($newContext)) return $fn;

        return (\Closure::fromCallable($fn))->bindTo($newContext);
    };
}
        