<?php

namespace FPPHP\Lists;

function filter($fn)
{
    return function ($iterable) use ($fn) {
        $isAssoc = \array_values($iterable) !== $iterable;
        $tmpArr = [];

        forEvery(function ($v, $k) use ($isAssoc, &$tmpArr, $fn) {
            if (\call_user_func_array($fn, [&$v, &$k])) {
                if ($isAssoc) {
                    $tmpArr[$k] = $v;
                } else {
                    \array_push($tmpArr, $v);
                }
            }
        })($iterable);

        return $tmpArr;
    };
}
