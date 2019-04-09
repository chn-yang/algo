<?php

function fib($n)
{
    $sum = 1;
    $prev = 1;

    while ($n > 2) {
        $n--;
        $next = $prev;
        $prev = $sum;
        $sum = $prev + $next;
    }
    return $sum;
}

for ($i = 1; $i < 35; $i++) {
    printf("%d\t%8d\n", $i, fib($i));
}