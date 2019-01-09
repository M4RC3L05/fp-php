<?php

namespace FPPHP\Lists;


function takeLast($num)
{
    return function ($iterable) use ($num) {
        return \array_slice($iterable, count($iterable) - $num);
    };
}
