<?php

namespace FPPHP\Lists;

/**
 * 
 * groupBy: (x -> string) -> [x] -> [string -> [x]]
 * 
 * Groups a given array by the result of calling the provided 
 * string returning function
 * 
 * @param callable $fn
 * @param array $list
 * @return array
 * 
 */
function groupBy(callable $fn)
{
    return function (array $list) use ($fn) {
        $tmpArr = [];

        foreach ($list as $k => $x) {
            $key = $fn($x);
            \array_key_exists($key, $tmpArr) ? \array_push($tmpArr[$key], $x) : $tmpArr[$key] = [$x];
        }

        return $tmpArr;
    };
}
