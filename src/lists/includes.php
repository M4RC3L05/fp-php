<?php

namespace FPPHP\Lists;

/**
 * 
 * includes: x -> [x] -> bool
 * 
 * Return the first element of the array
 * 
 * @param mixed $value
 * @param array $list
 * @return bool
 * 
 */
function includes($value)
{
    return function (array $list) use ($value) {
        $isAssocVal = (\is_array($value) && isAssoc($value));

        foreach ($list as $key => $v) {
            if ($isAssocVal) {
                if ([$key => $v] === $value) return true;
            } else {
                if ($v === $value) return true;
            }
        }

        return false;
    };
}
