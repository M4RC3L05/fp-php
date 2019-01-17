<?php

namespace FPPHP\Lists;

function takeLastWhile($perdicate)
{
    return function ($arr) use ($perdicate) {
        $fromAt = 0;

        foreach (\array_reverse($arr) as $key => $value) {
            if (!\call_user_func_array($perdicate, [&$value])) break;

            $fromAt += 1;
        }

        return \array_slice($arr, \count($arr) - $fromAt);
    };
}
