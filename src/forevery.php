<?php

namespace FPPHP;

function forEvery($action, $data)
{
    if (!\is_callable($action)) throw new \Exception("Action must be a function.");

    // For older versions of php
    if (!\function_exists("is_iterable")) {
        if (\is_array($data) || (\is_object($data) && ($data instanceof \Traversable)))
            throw new \Exception("Data must be a iterable.");
    } else
        if (!\is_iterable($data)) throw new \Exception("Data must be a iterable.");

    foreach ($data as $k => $v)
        \call_user_func($action, $v, $k);

}
