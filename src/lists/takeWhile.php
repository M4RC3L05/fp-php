<?php

namespace FPPHP\Lists;

function takeWhile(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {
        $spliAt = 0;

        foreach ($arr as $key => $value) {
            if (!$perdicate($value)) break;

            $spliAt += 1;
        }

        return \array_splice($arr, 0, $spliAt);
    };
}
