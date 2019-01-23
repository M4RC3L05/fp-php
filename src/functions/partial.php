<?php

namespace FPPHP\Functions;

function partial(callable $fn)
{
    return function (array $firstArgs) use ($fn) {
        return function (...$rest) use ($firstArgs, $fn) {
            return $fn(...\array_merge($firstArgs, $rest));
        };
    };
}
