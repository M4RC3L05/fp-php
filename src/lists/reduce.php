<?php

namespace FPPHP\Lists;

function reduce(callable $fn)
{
    return function ($init) use ($fn) {
        return function (array $iterable) use ($fn, $init) {
            return \array_reduce($iterable, $fn, $init);
        };
    };
}
