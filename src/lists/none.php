<?php

namespace FPPHP\Lists;

function none(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {
        foreach ($arr as $key => $value) {
            if ($perdicate($value, $key)) return false;
        }

        return true;
    };
}
