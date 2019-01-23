<?php

namespace FPPHP\Lists;

function rangeList(int $from)
{
    return function (int $to) use ($from) {
        return \range($from, $to);
    };
}
