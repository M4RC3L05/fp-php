<?php

namespace FPPHP\Lists;

/**
 * 
 * scan: ((x, y) -> x) -> x -> [y] -> [x]
 * 
 * Returns a new array in wich the values are the result of 
 * applying the $scanFN to each element of the $list
 * 
 * @param callable $scanFN
 * @param mixed $init
 * @param array $list
 * @return array
 * 
 */
function scan(callable $scanFN)
{
    return function ($init) use ($scanFN) {
        return function (array $arr) use ($init, $scanFN) {
            $arrLength = count($arr);
            $tmpArr = [$init];
            $tmpInit = $init;

            foreach ($arr as $key => $value) {
                $tmpInit = $scanFN($tmpInit, $value);
                \array_push($tmpArr, $tmpInit);
            }

            return $tmpArr;
        };
    };
}
