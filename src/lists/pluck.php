<?php

namespace FPPHP\Lists;

function pluck($index)
{
    return function ($arr) use ($index) {
        $isAssoc = \array_values($arr) !== $arr;

        $tmpArr = [];

        foreach ($arr as $key => $value) {
            if ($isAssoc) {
                if (\array_key_exists($index, $value))
                    $tmpArr[$key] = $value[$index];
                else
                    $tmpArr[$key] = null;
            } else {
                if (\array_key_exists($index, $value))
                    \array_push($tmpArr, $value[$index]);
                else
                    \array_push($tmpArr, null);
            }
        }

        return $tmpArr;
    };
}
