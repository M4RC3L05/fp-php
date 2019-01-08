<?php

namespace FPPHP\Iterable;

use function FPPHP\Functions\compose;

function tail($iterable)
{
    if (\is_array($iterable))
        return compose("\\array_reverse", function ($arr) {
        \array_pop($arr);
        return $arr;
    }, "\\array_reverse", "\\array_values")($iterable);


    if (\is_object($iterable) && ($iterable instanceof \Iterator)) {
        return compose("\\array_reverse", function ($arr) {
            \array_pop($arr);
            return $arr;
        }, "\\array_reverse", function ($it) {
            return \iterator_to_array($it, false);
        })($iterable);
    }


    return [];
}
