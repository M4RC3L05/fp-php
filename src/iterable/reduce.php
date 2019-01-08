<?php

namespace FPPHP\Iterable;

function reduce($fn)
{
    return function ($init) use ($fn) {
        return function ($iterable) use ($fn, $init) {
            if (\is_array($iterable)) return \array_reduce($iterable, $fn, $init);

            if (\is_object($iterable) && ($iterable instanceof \Iterator)) {
                $acc = $init;

                while ($iterable->valid()) {
                    $acc = \call_user_func_array($fn, [$acc, $iterable->current()]);
                    $iterable->next();
                }

                return $acc;
            }

            return null;
        };
    };
}
