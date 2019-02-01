<?php

namespace FPPHP\Lists;

/**
 * 
 * unfold: (x -> [y]) -> * -> [y]
 * 
 * Returns a new array by calling the $iterFn that returns a tuple
 * [value to add, seed for the next call] until the result if false
 * 
 * @param callable $iterFn
 * @return array
 * 
 */
function unfold(callable $iterFn)
{
    return function ($seed) use ($iterFn) {
        $tmpArr = [];
        $innerSeed = $seed;

        $res = null;

        while ($res = $iterFn($innerSeed)) {
            \array_push($tmpArr, $res[0]);
            $innerSeed = $res[1];
        }

        return $tmpArr;
    };
}
