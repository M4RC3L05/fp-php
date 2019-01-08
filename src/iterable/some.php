<?php

namespace FPPHP\Iterable;

use function FPPHP\Utils\isIterable;


function some($condition)
{
    return function ($iterable) use ($condition) {

        if (!\is_callable($condition)) throw new \Exception("Must pass a valid function.");

        if (!isIterable($iterable)) throw new \Exception("Must pass a valid iterable.");

        foreach ($iterable as $k => $v)
            if (\call_user_func($condition, $v)) return true;

        return false;
    };
}
