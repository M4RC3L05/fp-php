<?php

namespace FPPHP\Functions;

/**
 * 
 * compose: ((y -> z), (x -> y), …, (o -> p), ((a, b, …, n) -> o)) -> ((a, b, …, n) -> z)
 * 
 * Composes functions from right to left 
 * 
 * @param array $fns
 * @param mixed $arg
 * @return callable
 * 
 */
function compose(...$fns)
{
    return pipe(...\array_reverse($fns));
}
