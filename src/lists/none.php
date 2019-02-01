<?php

namespace FPPHP\Lists;

/**
 * 
 * none: (x -> bool) -> [x] -> bool
 * 
 * Return true if non of the elements match the perdicate,
 * otherwise return false
 * 
 * @param callable $perdicate
 * @param array $list
 * @return bool
 * 
 */
function none(callable $perdicate)
{
    return function (array $list) use ($perdicate) {
        foreach ($list as $key => $value) {
            if ($perdicate($value, $key)) return false;
        }

        return true;
    };
}
