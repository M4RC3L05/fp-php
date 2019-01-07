<?php

namespace FPPHP;

function pipe(...$fns)
{
    return function (...$args) use (&$fns) {
        return array_reduce($fns, function ($acc, $curr) {
            return [$curr(...$acc)];
        }, $args)[0];
    };
}