<?php

namespace FPPHP\Lists;

function findIndex(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {
        foreach ($arr as $key => $value) {
            if ($perdicate($value, $key)) return $key;
        }

        return -1;
    };
}
