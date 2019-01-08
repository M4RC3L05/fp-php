<?php

namespace FPPHP\Iterable;

use function FPPHP\Utils\isIterable;


function forEvery($action)
{
    return function ($data) use ($action) {
        if (!\is_callable($action)) throw new \Exception("Must pass a valid function.");

        if (!isIterable($data)) throw new \Exception("Must pass a valid iterable.");

        foreach ($data as $k => $v)
            \call_user_func($action, $v, $k);
    };
}
