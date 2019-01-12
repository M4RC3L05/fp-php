<?php

namespace FPPHP\Lists;

function filter($fn)
{
    return function ($iterable) use ($fn) {
        $isAssoc = \array_values($iterable) !== $iterable;
        $tmpArr = [];

        foreach ($iterable as $key => $value) {
            if (\call_user_func_array($fn, [&$value, &$key])) {
                if ($isAssoc) {
                    $tmpArr[$key] = $value;
                } else {
                    \array_push($tmpArr, $value);
                }
            }
        }

        return $tmpArr;
    };
}
