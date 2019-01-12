<?php

namespace FPPHP\Lists;

function mapAccumRight($fn)
{
    return function ($acc) use ($fn) {
        return function ($arr) use ($fn, $acc) {

            $res = [];
            $tuple = [$acc];

            foreach (reverse(true)($arr) as $key => $value) {
                $tuple = \call_user_func_array($fn, [&$tuple[0], &$value]);
                $res[$key] = $tuple[1];
            }

            return [$tuple[0], $res];
        };
    };
}
