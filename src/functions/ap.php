<?php

namespace FPPHP\Functions;

/**
 * 
 * ap: [(x -> y)] -> [x] -> [y]
 * 
 * Applies a list of functions to a list of values
 * 
 * @param array $fnList
 * @param array $valList
 * @return array
 * 
 */
function ap(array $fnList)
{
    return function (array $valList) use ($fnList) {
        $tmpArr = [];

        foreach ($fnList as $key => $fn) {
            foreach ($valList as $key => $value) {
                \array_push($tmpArr, $fn($value));
            }
        }

        return $tmpArr;
    };
}
