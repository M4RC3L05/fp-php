<?php

namespace FPPHP\Functions;

/**
 *
 * unapply: int -> (a -> b) -> (a -> c)
 *
 * Returns a function with n arity
 *
 * @param int $n
 * @param callable $fn
 * @param mixed $args
 * @return mixed
 *
 */
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
