<?php

namespace FPPHP\Functions;

use function FPPHP\Lists\reduce;

function pipe(...$fns)
{
    return function ($arg) use ($fns) {

        return reduce(function ($acc, $curr) {
            return $curr($acc);
        })($arg)($fns);
    };
}
