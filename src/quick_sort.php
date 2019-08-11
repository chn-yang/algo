<?php

function quick($arr)
{
    $length = count($arr);
    if ($length <= 1) { //递归必须要有的跳出条件, 基础快排条件为数组长度<=1
        return $arr;
    }

    $index = $length >> 1; //设定的中心点为数组长度除2,中间元素
    $left = [];
    $right = [];

    for ($i = 0; $i < $length; $i++) {
        if ($i == $index) {
            continue;
        }
        if ($arr[$i] < $arr[$index]) { //数<中点,全去左边
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i]; //数>=中点,全去右边
        }
    }

    //递归的分解数组,直到子数组长度为1后, 顶端的栈一个个的合并分解的数组
    return array_merge(quick($left), [$arr[$index]], quick($right));
}

$old = 'old.log';
$length = 10000;
$arr = [];
for ($i = 0; $i < $length; $i++) {
    $num = mt_rand(1, 1000);
    $arr[] = $num;
    file_put_contents($old, $num . "\n", FILE_APPEND);
}

$begin = microtime(true);
$arr = quick($arr);
$end = microtime(true);
echo "快速排序算法耗费时间：" . ($end - $begin) . PHP_EOL;

$sorted = 'sorted.log';
$fh = fopen($sorted, 'w');
$length = count($arr);
for ($i = 0; $i < $length; $i++) {
    fwrite($fh, $arr[$i] . PHP_EOL);
}
fclose($fh);
