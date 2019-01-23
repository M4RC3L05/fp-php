<?php

namespace FPPHP\Lists;

function into($acc)
{
    return function (callable $fn) use ($acc) {
        return function (array $arr) use ($acc, $fn) {
            return \array_merge($acc, $fn($arr));
        };
    };
}
