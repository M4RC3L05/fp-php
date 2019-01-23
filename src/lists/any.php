<?php

namespace FPPHP\Lists;

function any(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {
        foreach ($arr as $key => $value) {
            if ($perdicate($value)) return true;
        }

        return false;
    };
}
