<?php

namespace FPPHP\Lists;

function chain(callable $fn)
{
    return function (array $arr) use ($fn) {
        $isAssoc = \array_values($arr) !== $arr;
        $tmpArr = [];

        foreach ($arr as $k => $v) {
            $val = $fn($v, $k);

            \is_array($val) ?
                $tmpArr = \array_merge($tmpArr, $val) : ($isAssoc ? $tmpArr[$k] = $val : \array_push($tmpArr, $val));
        }

        return $tmpArr;
    };
}
