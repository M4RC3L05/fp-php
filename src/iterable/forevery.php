<?php

namespace FPPHP\Iterable;

use function FPPHP\Utils\isIterable;


function forEvery($action)
{
    return function ($data) use ($action) {
        foreach ($data as $k => $v)
            \call_user_func($action, $v, $k);
    };
}
