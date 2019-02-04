<?php

namespace FPPHP\Functions;

function flip(callable $fn)
{

    return curryN(((new \ReflectionFunction(\Closure::fromCallable($fn)))->getNumberOfParameters()))(function ($x, $y, ...$args) use ($fn) {
        return $fn($y, $x, ...$args);
    });
}
        