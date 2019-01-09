<?php

namespace FPPHP\Lists;

use function FPPHP\Functions\compose;


function last($iterable)
{
    return head(\array_reverse($iterable));
}
