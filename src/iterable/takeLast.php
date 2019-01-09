<?php

namespace FPPHP\Iterable;

function takeLast($num)
{
    return function ($iterable) use ($num) {
        if (\is_array($iterable))
            return take($num)(\array_slice($iterable, count($iterable) - $num));

        if (\is_object($iterable) && ($iterable instanceof \Iterator)) {
            $arr = \iterator_to_array($iterable, true);
            return take($num)(\array_slice($arr, count($arr) - $num));
        }

        return [];
    };
}
