<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;


function dropLastWhile(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {

        $isAssoc = isAssoc($arr);

        $arrToTraverse = reverse($arr);

        foreach ($arrToTraverse as $key => $value) {
            if (!$perdicate($value)) {
                if ($isAssoc) return take(\count($arr) - \array_search($key, \array_keys($arrToTraverse)))($arr);
                else return take(\count($arr) - $key)($arr);
            }
        }

        return \array_slice($arr, 0);
    };
}
