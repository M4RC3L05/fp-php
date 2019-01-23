<?php

namespace FPPHP\Lists;

function splitWhen(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {
        if (count($arr) <= 0) return [[], []];
        $splitAt = 0;
        $values = \array_values($arr);
        $tmpArr = [];


        while ($splitAt < count($arr) && !$perdicate($values[$splitAt])) {
            \array_push($tmpArr, $values[$splitAt]);
            $splitAt += 1;
        }

        return [$tmpArr, \array_slice($arr, $splitAt)];
    };
}
