<?php

namespace FPPHP\Lists;

/**
 * 
 * mapAccum: ((acc, y) -> (acc, z)) -> acc -> [y] -> (acc, [z])
 * 
 * Returns a tuple with the accumulated value, as well as the new
 * list.
 * 
 * @param callable $fn
 * @param array $list
 * @return array
 * 
 */
function mapAccum(callable $fn)
{
    return function ($acc) use ($fn) {
        return function (array $list) use ($fn, $acc) {

            $res = [];
            $tuple = [$acc];

            foreach ($list as $key => $value) {
                $tuple = $fn($tuple[0], $value);
                $res[$key] = $tuple[1];
            }

            return [$tuple[0], $res];
        };
    };
}
