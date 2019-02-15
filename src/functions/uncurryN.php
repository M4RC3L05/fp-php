<?php

namespace FPPHP\Functions;

function uncurryN(int $n)
{
    return function (callable $fn) use ($n) {
        return function () use ($fn, $n) {
            $args = \array_slice(\func_get_args(), 0, $n);
            $currFnPos = $fn;
            $pos = 0;

            while ($pos < $n && \is_callable($currFnPos)) {
                $currFnPos = $currFnPos($args[$pos]);
                $pos += 1;
            }

            return $currFnPos;
        };
    };
}
