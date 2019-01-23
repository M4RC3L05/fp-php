<?php

namespace FPPHP\Lists;

function reverse(...$rest)
{
    return function (array $iterable) use ($rest) {
        return \array_reverse($iterable, ...$rest);
    };
}
