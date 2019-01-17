<?php

namespace FPPHP\Lists;

function splitWhen($perdicate)
{
    return function ($arr) use ($perdicate) {
        if (count($arr) <= 0) return [[], []];
        $splitAt = 0;
        $values = \array_values($arr);
        $tmpArr = [];


        while ($splitAt < count($arr) && !\call_user_func_array($perdicate, [&$values[$splitAt]])) {
            \array_push($tmpArr, $values[$splitAt]);
            $splitAt += 1;
        }

        return [$tmpArr, \array_slice($arr, $splitAt)];
    };
}
