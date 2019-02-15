<?php

namespace FPPHP\Functions;

/**
 *
 * tryCatch: (…x → a) → ((e, …x) → a) → (…x → a)
 *
 * Takes 2 functions and try to execute the first, if all worked returns
 * the result else, if any exception try to run the second function
 * and returns the result
 *
 * @param callable $tryer
 * @param callable $catcher
 * @param mixed $args
 * @return mixed
 *
 */
function tryCatch(callable $tryer)
{
    return function (callable $catcher) use ($tryer) {
        return function (...$args) use ($catcher, $tryer) {
            try {
                return $tryer(...$args);
            } catch (\Exception $e) {
                return $catcher(...$args);
            }
        };
    };
}
