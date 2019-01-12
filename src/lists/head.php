<?php

namespace FPPHP\Lists;

function head($iterable)
{
    if (count($iterable) <= 0) return null;

    return \array_values($iterable)[0];
}


