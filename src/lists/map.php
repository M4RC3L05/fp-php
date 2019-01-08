<?php

namespace FPPHP\Lists;

function map($fn)
{
    return function ($iterable) use ($fn) {
        return \array_map($fn, $iterable);
    };
}
