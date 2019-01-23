<?php

namespace FPPHP\Lists;

function find(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {
        foreach ($arr as $key => $value) {
            if ($perdicate($value, $key)) return $value;
        }

        return null;
    };
}
