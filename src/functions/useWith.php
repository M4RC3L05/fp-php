<?php

namespace FPPHP\Functions;

use function FPPHP\Lists\map;

/**
 *
 * useWith: ((x1, x2, …) → z) → [(a → x1), (b → x2), …] → (a → b → … → z)
 *
 * Recieves a function and a list of trasformers and returns a function
 * with the same arity of the provided function and returns teh result
 * of calling the provided functions with the args trasformed by is
 * curresponding trasformer (by index)
 *
 * @param callable $fn
 * @param array $trasformers
 * @param mixed ...$args
 * @return mixed
 *
 */
function useWith(callable $fn)
{
    return function (array $trasformers) use ($fn) {
        return curryN((new \ReflectionFunction(\Closure::fromCallable($fn)))->getNumberOfParameters())(function (...$args) use ($trasformers, $fn) {
            foreach ($args as $key => $value) {
                $args[$key] = $trasformers[$key]($value);
            }

            return $fn(...$args);
        });
    };
}
