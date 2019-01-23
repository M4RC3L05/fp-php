<?php

namespace FPPHP\Lists;

function takeLastWhile(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {
        $fromAt = 0;

        foreach (\array_reverse($arr) as $key => $value) {
            if (!$perdicate($value)) break;

            $fromAt += 1;
        }

        return \array_slice($arr, \count($arr) - $fromAt);
    };
}
