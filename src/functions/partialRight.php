<?php

namespace FPPHP\Functions;

function partialRight($fn)
{
    return function ($lastArgs) use ($fn) {
        return function (...$firsts) use ($fn, $lastArgs) {
            return \call_user_func_array($fn, \array_merge($firsts, $lastArgs));
        };
    };
}
