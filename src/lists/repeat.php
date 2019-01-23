<?php

namespace FPPHP\Lists;

function repeat($val)
{
    return function (int $times) use ($val) {
        $tmparr = [];

        for ($i = 0; $i < $times; $i++) {
            \array_push($tmparr, $val);
        }

        return $tmparr;
    };
}
