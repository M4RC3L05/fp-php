<?php

namespace FPPHP\Lists;

function chain($fn)
{
    return function ($arr) use ($fn) {
        $tmpArr = [];

        foreach ($arr as $k => $v)
            $tmpArr = \array_merge($tmpArr, \call_user_func_array($fn, [&$v, &$k]));

        return $tmpArr;
    };
}
