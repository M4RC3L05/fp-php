<?php

namespace FPPHP\Iterable;

function head($iterable)
{
    if (\is_array($iterable))
        return \array_values($iterable)[0];

    if (\is_object($iterable) && ($iterable instanceof \Iterator))
        return \iterator_to_array($iterable, false)[0];


    return null;
}


