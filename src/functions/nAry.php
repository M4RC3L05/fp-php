<?php

namespace FPPHP\Functions;

function nAry(int $n)
{
    return function (callable $fn) use ($n) {
        $nArgs = ((new \ReflectionFunction(\Closure::fromCallable($fn)))->getNumberOfParameters());
        return curryN($n)(function (...$args) use ($fn, $n, $nArgs) {
            if ($nArgs > $n) {
                $arrFill = \array_fill(0, ($nArgs - $n), null);
                $tmpArgs = \array_merge($args, $arrFill);
                return $fn(...$tmpArgs);
            }

            return $fn(...$args);
        });
    };
}
        