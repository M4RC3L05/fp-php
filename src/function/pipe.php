<?php

namespace FPPHP\Funtion;

function pipe(...$fns)
{
    return function ($arg) use (&$fns) {

        if (\is_null($arg) || !isset($arg)) throw new \Exception("No argument provided.");

        if (\count($fns) <= 0) throw new \Exception("No functions provided.");

        return array_reduce($fns, function ($acc, $curr) {

            if (!\is_callable($curr)) throw new \Exception("Could not call function.");

            return \call_user_func($curr, $acc);
        }, $arg);
    };
}
