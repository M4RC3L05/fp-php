<?php

namespace FPPHP\Lists;

use function FPPHP\Functions\compose;
use function FPPHP\Lists\takeLast;

function tail($iterable)
{
    return takeLast(count($iterable) - 1)($iterable);
}
