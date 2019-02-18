<?php

function binary_search($needle, $arr)
{
    $low = 0;
    $high = count($arr);

    while ($low <= $high) {
        $mid = floor($low + ($high - $low) / 2);
        if ($needle == $arr[$mid]) {        //命中需要查找的数,返回
            return $mid;
        } elseif ($needle < $arr[$mid]) {   //查找的数比中数小,最大数=中数-1
            $high = $mid - 1;
        } elseif ($needle > $arr[$mid]) {   //查找的数比中数大,最小数=中数+1
            $low = $mid + 1;
        }
    }
    return -1;
}

for ($i = 0; $i < 10; $i++) {
    $num = mt_rand(1, 100);
    $offset = binary_search($num, range(1, 100));
    printf("%03d在%03d\n", $num, $offset);
}
