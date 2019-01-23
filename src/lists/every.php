<?php

namespace FPPHP\Lists;

function every(callable $condition)
{
    return function (array $iterable) use ($condition) {
        $tmp = false;


        foreach ($iterable as $key => $value) {
            $tmp = $condition($value, $key);
        }

        return $tmp;
    };
}
