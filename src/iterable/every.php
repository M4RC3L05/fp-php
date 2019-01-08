<?php

namespace FPPHP\Iterable;

function every($condition)
{
    return function ($iterable) use ($condition) {

        if (!\is_callable($condition)) throw new \Exception("Must pass a valid function.");

        $tmp = false;

        forEvery(function ($v) use ($condition, &$tmp) {
            $tmp = \call_user_func($condition, $v);
        })($iterable);

        return $tmp;
    };
}
