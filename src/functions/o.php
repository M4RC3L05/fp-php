<?php

namespace FPPHP\Functions;

/**
 * 
 * o: (y -> z) -> (x -> y) -> x -> z
 * 
 * gets up to 2 functions and compose them
 * 
 * @param int $n
 * @return callable
 * 
 */
function o(...$fns)
{
    $fFns = \array_slice($fns, 0, 2);

    return compose(...$fFns);
}
        