<?php

namespace FPPHP\Lists;

function times(callable $fn)
{
    return function (int $times) use ($fn) {
        $tmpArr = [];
        $prev = 0;
        $prevRes = 0;

        for ($i = 0; $i < $times; $i++) {
            \array_push($tmpArr, $fn($prev));
            $prev += 1;
        }

        return $tmpArr;
    };
}
