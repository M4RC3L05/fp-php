<?php

namespace FPPHP\Lists;

function last($arr)
{
    if (\count($arr) <= 0) return null;
    return head(reverse(true)($arr));
}
