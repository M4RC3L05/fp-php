<?php

namespace FPPHP\Lists;

function reverse(...$rest)
{
    return function ($iterable) use ($rest) {
        return \array_reverse($iterable, ...$rest);
    };
}
