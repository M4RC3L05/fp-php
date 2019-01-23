<?php

namespace FPPHP\Functions;

function partialRight(callable $fn)
{
    return function (array $lastArgs) use ($fn) {
        return function (...$firsts) use ($fn, $lastArgs) {
            return $fn(...\array_merge($firsts, $lastArgs));
        };
    };
}
