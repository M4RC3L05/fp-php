<?php

namespace FPPHP\Lists;

/**
 * 
 * transduce: (z -> z) -> ((x, y) -> x) -> x -> [y] -> x
 * 
 * Recives a tranducer a reducing function an initial value,
 * and a array, and reduces the array by calling the transducer
 * with the reducer function, and using the result as the 
 * final reducing function to the reduce function
 * 
 * @param callable $xf
 * @param callable $rf
 * @param mixed $init
 * @param array $list
 * @return array
 * 
 */
function transduce(callable $xf)
{
    return function (callable $rf) use ($xf) {
        return function ($init) use ($rf, $xf) {
            return function (array $list) use ($init, $rf, $xf) {
                return reduce($xf($rf))($init)($list);
            };
        };
    };
}
