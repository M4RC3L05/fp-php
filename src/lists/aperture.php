<?php

namespace FPPHP\Lists;

function aperture($num)
{
    return function ($arr) use ($num) {
        $tmpArr = [];
        $pairs = 0;
        $curr = 0;

        if ($num > \count($arr)) return $tmpArr;

        if ($num === \count($arr)) return \array_slice($arr, 0);

        $isAssoc = \array_values($arr) !== $arr;
        $tmpArr = [[]];

        forEvery(function ($x, $k) use (&$pairs, &$curr, &$tmpArr, $num, $isAssoc) {
            if ($pairs > $num - 1) {
                $pairs = 0;
                $curr += 1;
                if ($isAssoc)
                    $tmpArr[$curr] = [$k => $x];
                else
                    $tmpArr[$curr] = [$x];
                $pairs += 1;
            } else {
                if ($isAssoc)
                    $tmpArr[$curr][$k] = $x;

                else \array_push($tmpArr[$curr], $x);

                $pairs += 1;
            }
        })($arr);

        return $tmpArr;
    };
}
