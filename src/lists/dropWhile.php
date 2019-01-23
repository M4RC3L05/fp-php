<?php

namespace FPPHP\Lists;

function dropWhile(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {
        $pos = 0;

        foreach ($arr as $key => $value) {
            if (!$perdicate($value, $key)) return takeLast(\count($arr) - $pos)($arr);

            $pos += 1;
        }

        return [];
    };
}
