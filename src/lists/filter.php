<?php

namespace FPPHP\Lists;

function filter($fn)
{
    return function (...$rest) use ($fn) {
        return function ($iterable) use ($fn, $rest) {
            $tmpArr = [];

            for ($i = 0; $i < count($iterable); $i++) {
                if (\call_user_func_array($fn, [&$iterable[$i]])) \array_push($tmpArr, $iterable[$i]);
            }

            return $tmpArr;
        };
    };

}
