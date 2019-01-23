<?php

namespace FPPHP\Lists;

function head(array $iterable)
{
    if (count($iterable) <= 0) return null;

    return \array_values($iterable)[0];
}


