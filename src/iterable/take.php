<?php

namespace FPPHP\Iterable;

function take($num)
{
    return function ($iterable) use ($num) {

        if (\is_array($iterable))
            return \array_slice($iterable, 0, $num);

        if (\is_object($iterable) && ($iterable instanceof \Iterator))
            return \array_slice(\iterator_to_array($iterable), 0, $num);

        return [];
    };
}
