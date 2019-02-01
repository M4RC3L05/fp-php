<?php

namespace FPPHP\Functions;

/**
 * 
 * ascend: (x -> y) -> x -> x -> int
 * 
 * Creates a ascending comparator from a functon tha retuns 
 * a value that will be compared with > < 
 * 
 * @param callable $fnGetProp
 * @param mixed $a
 * @param mixed $b
 * @return int
 * 
 */
function ascend(callable $fnGetProp)
{
    return function ($a, $b) use ($fnGetProp) {
        $valA = $fnGetProp($a);
        $valB = $fnGetProp($b);

        $max = \max($valA, $valB);

        return ($max === $valA ? 1 : ($max === $valB ? -1 : 0));
    };
}
