<?php

namespace FPPHP\Lists;

function repeat($val)
{
    return function ($times) use ($val) {
        $tmparr = [];

        for ($i = 0; $i < $times; $i++) {
            \array_push($tmparr, $val);
        }

        return $tmparr;
    };
}
