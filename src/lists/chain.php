<?php

namespace FPPHP\Lists;

function chain(callable $fn)
{
    return function (array $arr) use ($fn) {
        $tmpArr = [];

        foreach ($arr as $k => $v) {
            $val = $fn($v, $k);

            \is_array($val) ?
                $tmpArr = \array_merge($tmpArr, $val) : \array_push($tmpArr, $val);
        }

        return $tmpArr;
    };
}
