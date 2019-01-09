<?php

namespace FPPHP\Iterable;

use function FPPHP\Functions\compose;

function tail($iterable)
{
    if (\is_array($iterable))
        return takeLast(count($iterable) - 1)($iterable);


    if (\is_object($iterable) && ($iterable instanceof \Iterator)) {
        $arr = \iterator_to_array($iterable, true);
        return takeLast(count($arr) - 1)($arr);
    }



    return [];
}
