<?php

namespace FPPHP\Iterable;

function every($condition)
{
    return function ($iterable) use ($condition) {
        $tmp = false;

        forEvery(function ($v) use ($condition, &$tmp) {
            $tmp = \call_user_func($condition, $v);
        })($iterable);

        return $tmp;
    };
}
