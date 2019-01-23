<?php

namespace FPPHP\Lists;

function findLast(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {
        foreach (reverse()($arr) as $key => $value) {
            if ($perdicate($value, $key)) return $value;
        }

        return null;
    };
}
