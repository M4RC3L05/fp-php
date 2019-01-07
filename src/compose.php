<?php

namespace FPPHP;

function compose(...$fns)
{
    return function (...$args) use (&$fns) {
        return array_reduce(array_reverse($fns), function ($acc, $curr) {
            return [$curr(...$acc)];
        }, $args)[0];
    };
}


$arr = [1, 2, 3];

forEvery(function ($v, $i) {
    echo "{$v}";
}, $arr);