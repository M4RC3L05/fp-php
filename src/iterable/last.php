<?php

namespace FPPHP\Iterable;

use function FPPHP\Functions\compose;


function last($iterable)
{
    if (\is_array($iterable))
        return compose("\\FPPHP\\Iterable\\head", "\\array_reverse")($iterable);

    if (\is_object($iterable) && ($iterable instanceof \Iterator))
        return compose("FPPHP\\Iterable\\head", "\\array_reverse", function ($arr) {
        return \iterator_to_array($arr, false);
    })($iterable);

    return null;
}
