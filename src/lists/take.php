<?php

namespace FPPHP\Lists;

function take(int $num)
{
    return function (array $iterable) use ($num) {
        if ($num < 0) return [];

        if ($num > \count($iterable)) return \array_slice($iterable, 0);

        return \array_slice($iterable, 0, $num, true);
    };
}
