<?php

namespace FPPHP\Lists;

function dropLastWhile($perdicate)
{
    return function ($arr) use ($perdicate) {

        $isAssoc = \array_values($arr) !== $arr;

        $arrToTraverse = reverse()($arr);

        foreach ($arrToTraverse as $key => $value) {
            if (!\call_user_func_array($perdicate, [&$value])) {
                if ($isAssoc) return take(\count($arr) - \array_search($key, \array_keys($arrToTraverse)))($arr);
                else return take(\count($arr) - $key)($arr);
            }
        }

        return \array_slice($arr, 0);
    };
}
