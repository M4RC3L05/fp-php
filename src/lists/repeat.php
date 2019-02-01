<?php

namespace FPPHP\Lists;

/**
 * 
 * repeat: x -> int -> [x]
 * 
 * Returns an array with the value repeated $times
 * 
 * @param mixed $value
 * @param int $times
 * @return array
 * 
 */
function repeat($value)
{
    return function (int $times) use ($value) {
        $tmparr = [];

        for ($i = 0; $i < $times; $i++) {
            \array_push($tmparr, $value);
        }

        return $tmparr;
    };
}
