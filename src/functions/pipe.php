<?php

namespace FPPHP\Functions;

use function FPPHP\Iterable\reduce;

function pipe(...$fns)
{
    return function ($arg) use ($fns) {
        return reduce(function ($acc, $curr) {
            return \call_user_func_array($curr, [&$acc]);
        })($arg)($fns);
    };
}
