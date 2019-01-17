<?php

namespace FPPHP\Lists;

function reduce($fn)
{
    return function ($init) use ($fn) {
        return function ($iterable) use ($fn, $init) {
            return \array_reduce($iterable, $fn, $init);
        };
    };
}
