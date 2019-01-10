<?php

namespace FPPHP\Lists;


function takeLast($num)
{
    return function ($iterable) use ($num) {
        if ($num < 0) return [];

        if ($num >= \count($iterable)) return \array_slice($iterable, 0);

        return \array_slice($iterable, count($iterable) - $num);
    };
}
