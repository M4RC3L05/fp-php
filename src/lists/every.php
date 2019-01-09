<?php

namespace FPPHP\Lists;

function every($condition)
{
    return function ($iterable) use ($condition) {
        $tmp = false;

        forEvery(function ($v, $k) use ($condition, &$tmp) {
            $tmp = \call_user_func_array($condition, [&$v, &$k]);
        })($iterable);

        return $tmp;
    };
}
