<?php

namespace FPPHP\Lists;

function rangeList($from)
{
    return function ($to) use ($from) {
        return \range($from, $to);
    };
}
