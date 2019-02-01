<?php

namespace FPPHP\Lists;

/**
 * 
 * reduceRight: ((x, y) → y) → y → [x] → y
 * 
 * Same as reduces, but reduces the elements from right to left
 * 
 * @param callable $fn
 * @param mixed $init
 * @param array $list
 * @return mixed
 * 
 */
function reduceRight(callable $fn)
{
    return function ($init) use ($fn) {
        return function (array $list) use ($fn, $init) {
            return \array_reduce(\array_reverse($list), $fn, $init);
        };
    };
}
