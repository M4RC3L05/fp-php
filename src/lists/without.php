<?php

namespace FPPHP\Lists;

/**
 * 
 * without: [x] -> [x] -> [x]
 * 
 * Returns a new array less the values that from the first argument
 * 
 * @param array $remArr
 * @param array $list
 * @return array
 * 
 */
function without(array $remArr)
{
    return function (array $list) use ($remArr) {
        return filter(function ($x) use ($remArr) {
            return !\in_array($x, $remArr, true);
        })($list);
    };
}
