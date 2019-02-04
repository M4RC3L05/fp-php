<?php

namespace FPPHP\Functions;

/**
 * 
 * descend: (x -> y) -> x -> x -> int
 * 
 * Creates a descending comparator from a functon that retuns 
 * a value that will be compared with > < 
 * 
 * @param callable $fnGetProp
 * @param mixed $a
 * @param mixed $b
 * @return int
 * 
 */
function descend(callable $fnGetProp)
{
    return function ($a, $b) use ($fnGetProp) {
        $valA = $fnGetProp($a);
        $valB = $fnGetProp($b);

        $max = \max($valA, $valB);

        return ($max === $valA ? -1 : ($max === $valB ? 1 : 0));
    };
}
        