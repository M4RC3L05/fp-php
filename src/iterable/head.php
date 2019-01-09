<?php

namespace FPPHP\Iterable;

function head($iterable)
{
    if (\is_array($iterable))
        return \array_values($iterable)[0];

    if (\is_object($iterable) && ($iterable instanceof \Iterator))
        return \array_values(\iterator_to_array($iterable, true))[0];


    return null;
}


