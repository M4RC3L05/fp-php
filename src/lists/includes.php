<?php

namespace FPPHP\Lists;

function includes($val)
{
    return function (array $arr) use ($val) {
        foreach ($arr as $key => $value) {
            if ($val === $value) return true;
        }

        return false;
    };
}
