<?php

namespace FPPHP\Lists;

function indexBy($fn)
{
    return function ($assocArr) use ($fn) {
        $tmpArr = [];

        foreach ($assocArr as $key => $value) {
            $key = \call_user_func_array($fn, [&$value]);

            $tmpArr[$key] = $value;
        }

        return $tmpArr;
    };
}
