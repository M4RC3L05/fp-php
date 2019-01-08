<?php

namespace FPPHP\Functions;

function pipe(...$fns)
{
    return function ($arg) use ($fns) {
        return array_reduce($fns, function ($acc, $curr) {
            return \call_user_func_array($curr, [&$acc]);
        }, $arg);
    };
}
