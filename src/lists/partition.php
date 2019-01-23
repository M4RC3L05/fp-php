<?php

namespace FPPHP\Lists;

function partition(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {

        if (\count($arr) <= 0) return [[], []];

        $isAssoc = \array_values($arr) !== $arr;

        $tmpArr = [[], []];

        foreach ($arr as $k => $v) {
            if (\call_user_func_array($perdicate, [&$v, &$k])) {
                if ($isAssoc) {
                    $tmpArr[0][$k] = $v;
                } else {
                    \array_push($tmpArr[0], $v);
                }
            } else {
                if ($isAssoc) {
                    $tmpArr[1][$k] = $v;
                } else {
                    \array_push($tmpArr[1], $v);
                }
            }
        }

        return $tmpArr;
    };
}
