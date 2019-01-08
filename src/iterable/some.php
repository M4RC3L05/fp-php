<?php

namespace FPPHP\Iterable;

function some($condition)
{
    return function ($iterable) use ($condition) {

        if (!\is_callable($condition)) throw new \Exception("Condition must be a function.");

        // For older versions of php
        if (!\function_exists("is_iterable")) {
            if (\is_array($iterable) || (\is_object($iterable) && ($iterable instanceof \Traversable)))
                throw new \Exception("Data must be a iterable.");
        } else
            if (!\is_iterable($iterable)) throw new \Exception("Data must be a iterable.");

        foreach ($iterable as $k => $v)
            if (\call_user_func($condition, $v)) return true;

        return false;
    };
}
