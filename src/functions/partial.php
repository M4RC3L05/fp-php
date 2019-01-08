<?php

namespace FPPHP\Functions;

function partial($fn)
{
    return function ($firstArgs) use ($fn) {
        return function (...$rest) use ($firstArgs, $fn) {
            return \call_user_func_array($fn, \array_merge($firstArgs, $rest));
        };
    };
}
