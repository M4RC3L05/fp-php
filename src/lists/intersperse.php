<?php

namespace FPPHP\Lists;

/**
 * 
 * intersperse: x -> [x] -> [x]
 * 
 * Returns a new array with every element separated by the value
 * provided
 * 
 * @param mixed $value
 * @param array $list
 * @return array
 * 
 */
function intersperse($value)
{
    return function (array $list) use ($value) {
        $tmpArr = [];
        $size = \count($list);

        foreach ($list as $key => $v) {
            \array_push($tmpArr, $v);

            if ($key + 1 < $size)
                \array_push($tmpArr, $value);
        }

        return $tmpArr;
    };
}
