<?php

namespace FPPHP\Functions;

function ascend(callable $fnGetProp)
{
    return function ($a, $b) use ($fnGetProp) {
        $valA = $fnGetProp($a);
        $valB = $fnGetProp($b);

        $max = \max($valA, $valB);

        return ($max === $valA ? 1 : ($max === $valB ? -1 : 0));
    };
}
