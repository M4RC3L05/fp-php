<?php

namespace FPPHP\Functions;

function apply(callable $fn)
{
    return function (array $args) use ($fn) {
        return $fn(...$args);
    };
}
