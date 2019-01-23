<?php

namespace FPPHP\Lists;

function indexOf($val)
{
    return function (array $arr) use ($val) {
        foreach ($arr as $key => $value) {
            if ($value === $val) return $key;
        }

        return -1;
    };
}
