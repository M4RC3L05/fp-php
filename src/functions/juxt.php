<?php

namespace FPPHP\Functions;

use function FPPHP\Lists\map;


function juxt(array $fns)
{
    return function (...$args) use ($fns) {
        return map(function ($fn) use ($args) {
            return $fn(...$args);
        })($fns);
    };
}
        