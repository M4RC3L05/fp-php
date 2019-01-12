<?php

namespace FPPHP\Lists;

use function FPPHP\Functions\compose;
use function FPPHP\Lists\takeLast;

function tail($iterable)
{
    if (count($iterable) <= 0) return [];
    return takeLast(count($iterable) - 1)($iterable);
}
