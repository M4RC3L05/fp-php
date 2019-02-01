<?php

namespace FPPHP\Lists;

/**
 * 
 * mapAccumRight: ((acc, y) -> (acc, z)) -> acc -> [y] -> (acc, [z])
 * 
 * Same as mapAccum but is applies the acc param from left to right
 * 
 * @param callable $fn
 * @param array $list
 * @return array
 * 
 */
function mapAccumRight(callable $fn)
{
    return function ($acc) use ($fn) {
        return function (array $list) use ($fn, $acc) {

            $res = [];
            $tuple = [$acc];

            foreach (\array_reverse($list, true) as $key => $value) {
                $tuple = $fn($tuple[0], $value);
                $res[$key] = $tuple[1];
            }

            return [$tuple[0], $res];
        };
    };
}
