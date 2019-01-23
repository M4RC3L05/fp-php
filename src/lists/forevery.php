<?php

namespace FPPHP\Lists;


function forEvery(callable $action)
{
    return function (iterable $data) use ($action) {
        foreach ($data as $k => $v)
            $action($v, $k);

        return $data;
    };
}
