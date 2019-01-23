<?php

namespace FPPHP\Lists;

function map(callable $fn)
{
    return function (array $iterable) use ($fn) {
        return \array_map($fn, $iterable);
    };
}
