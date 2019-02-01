<?php

namespace FPPHP\Lists;

/**
 * 
 * find: (x -> bool) -> [x] -> x
 * 
 * Returns the value that matches the perdicate
 * 
 * @param callable $perdicate
 * @param array $list
 * @return mixed
 * 
 */
function find(callable $perdicate)
{
    return function (array $list) use ($perdicate) {
        foreach ($list as $key => $value) {
            if ($perdicate($value, $key)) return $value;
        }

        return null;
    };
}
