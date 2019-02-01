<?php

namespace FPPHP\Lists;

/**
 * 
 * indexBy: (x -> string) -> [[x => y]] -> [string => [x => y]]
 * 
 * Returns an associative array in wich the keys are generated
 * by applying the function to the associative array of the array
 * that was provided.
 * If the same key is generated multiple times, only the last
 * element will be included
 * 
 * @param callable $fn
 * @param array $list
 * @return array
 * 
 */
function indexBy(callable $fn)
{
    return function (array $list) use ($fn) {
        $tmpArr = [];

        foreach ($list as $key => $value) {
            $key = $fn($value);

            $tmpArr[$key] = $value;
        }

        return $tmpArr;
    };
}
