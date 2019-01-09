<?php

namespace FPPHP\Lists;

function take($num)
{
    return function ($iterable) use ($num) {
        return \array_slice($iterable, 0, $num, true);
    };
}
