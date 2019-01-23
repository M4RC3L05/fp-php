<?php

namespace FPPHP\Lists;

use function FPPHP\Utils\isIterable;


function some(callable $condition)
{
    return function (array $iterable) use ($condition) {
        foreach ($iterable as $k => $v)
            if ($condition($v)) return true;

        return false;
    };
}
