<?php

namespace FPPHP\Lists;

function last(array $arr)
{
    if (\count($arr) <= 0) return null;
    return head(reverse($arr));
}
