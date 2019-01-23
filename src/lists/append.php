<?php

namespace FPPHP\Lists;

function append($item)
{
    return function (array $arr) use ($item) {
        if (\array_values($arr) !== $arr) return \array_merge($arr, $item);
        return \array_merge($arr, [$item]);
    };
}
