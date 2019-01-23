<?php

namespace FPPHP\Lists;

function contains($val)
{
    return function (array $toCompare) use ($val) {
        $isAssocVal = (\is_array($val) && \array_values($val) !== $val);

        foreach ($toCompare as $key => $value) {
            if ($isAssocVal) {
                if ([$key => $value] === $val) return true;
            } else {
                if ($value === $val) return true;
            }
        }

        return false;
    };
}
