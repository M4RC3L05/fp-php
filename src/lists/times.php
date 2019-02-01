<?php

namespace FPPHP\Lists;

/**
 * 
 * times: (int -> x) -> int -> [x]
 * 
 * Returns a new array with length $times, in wich the values
 * are the result of calling the function on each iteration
 * 
 * @param callable $fn
 * @param int $times
 * @return array
 * 
 */
function times(callable $fn)
{
    return function (int $times) use ($fn) {
        $tmpArr = [];
        $prev = 0;
        $prevRes = 0;

        for ($i = 0; $i < $times; $i++) {
            \array_push($tmpArr, $fn($prev));
            $prev += 1;
        }

        return $tmpArr;
    };
}
