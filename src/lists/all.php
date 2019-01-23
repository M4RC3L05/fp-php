<?php

namespace FPPHP\Lists;

function all(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {

        foreach ($arr as $key => $value) {
            if (!$perdicate($value)) return false;
        }

        return true;
    };
}
