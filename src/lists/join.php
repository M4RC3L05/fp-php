<?php

namespace FPPHP\Lists;

/**
 * 
 * join: string -> [x] -> string
 * 
 * Joins an array to a string with the values separated by the
 * value provided in seperator
 * 
 * @param string $separator
 * @param array $list
 * @return string
 * 
 */
function join(string $separator)
{
    return function (array $arr) use ($separator) {
        return \implode($separator, $arr);
    };
}
