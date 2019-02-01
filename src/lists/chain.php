<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;

/**
 * 
 * chain: m -> (a -> mb) -> ma -> mb
 * 
 * Applies a functions to every element of an array and returns
 * the results as an array.
 * If the 2 argument is a function, chain(f, g)(x) === f(g(x), x)
 * 
 * @param callable ...$fns
 * @param array $list
 * @return array
 * 
 */
function chain(...$fns)
{
    return function (array $list) use ($fns) {

        if (\count($fns) === 2) {
            $fn1 = $fns[0];
            $fn2 = $fns[1];
            return $fn1($fn2($list))($list);
        }

        $isAssoc = isAssoc($list);
        $tmpArr = [];
        $fn = $fns[0];

        foreach ($list as $k => $v) {
            $val = $fn($v, $k);

            if (\is_array($val)) {
                $tmpArr = \array_merge($tmpArr, $val);
                continue;
            }

            if ($isAssoc) {
                $tmpArr[$k] = $val;
            } else {
                \array_push($tmpArr, $val);
            }
        }

        return $tmpArr;
    };
}
