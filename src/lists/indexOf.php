<?php

namespace FPPHP\Lists;

function indexOf($val)
{
    return function ($arr) use ($val) {
        foreach ($arr as $key => $value) {
            if ($value === $val) return $key;
        }

        return -1;
    };
}
