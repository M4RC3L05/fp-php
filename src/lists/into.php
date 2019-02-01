<?php

namespace FPPHP\Lists;

/**
 * 
 * into: x -> (y -> y) -> [z] -> x
 * 
 * Returns a new array by applying on every element of the array
 * the given transducer and appending the resulte by the correct
 * reducer function
 * 
 * @param mixed $acc
 * @param callable $xf
 * @param array $list
 * @return mixed
 * 
 */
function into($acc)
{
    return function (callable $xf) use ($acc) {
        return function (array $list) use ($acc, $xf) {
            $rf = function ($ac, $cr) use ($acc) {
                if (\is_numeric($acc)) return $ac + $cr;
                if (\is_string($acc)) return $ac . $cr;
                if (\is_array($acc)) {
                    \array_push($ac, $cr);
                    return $ac;
                }

                return $acc;
            };
            return reduce($xf($rf))($acc)($list);
        };
    };
}
