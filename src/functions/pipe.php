<?php

namespace FPPHP\Functions;

use function FPPHP\Lists\reduce;

/**
 * 
 * pipe: (((a, b, …, n) → o), (o → p), …, (x → y), (y → z)) → ((a, b, …, n) → z)
 * 
 * Similar to compose bute functions are composed from left to right
 * 
 * @param array $fns
 * @param mixed $arg
 * @return callable
 * 
 */
function pipe(...$fns)
{
    return function ($arg) use ($fns) {

        return reduce(function ($acc, $curr) {
            return $curr($acc);
        })($arg)($fns);
    };
}
