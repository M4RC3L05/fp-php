<?php

namespace FPPHP\Lists;

/**
 * 
 * adjust: int -> (x -> x) -> [x] -> [x]
 * 
 * Applies a callable to a given index, of a given array, returning a new array 
 * with the given index replaced with the result of the callable
 * 
 * @param int $num
 * @param callable $fn
 * @param array $list
 * @return array
 * 
 */
function adjust(int $num)
{
    return function (callable $fn) use ($num) {
        return function (array $list) use ($fn, $num) {
            $arrValues = \array_values($list);
            $toModify = \array_slice($list, 0);
            $positiveNum = ($num < 0 ? \count($list) + $num : $num);

            if (!\array_key_exists($positiveNum, $arrValues)) return $toModify;

            $arrValues[$positiveNum] = $fn($arrValues[$positiveNum]);

            return \array_combine(\array_keys($list), $arrValues);
        };
    };
}
