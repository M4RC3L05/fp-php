<?php

namespace FPPHP\Lists;

function findLastIndex(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {
        foreach (reverse($arr) as $key => $value) {
            if ($perdicate($value, $key)) return $key;
        }

        return -1;
    };
}
