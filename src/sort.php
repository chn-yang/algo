<?php
function bubble($arr)
{
    $length = count($arr);
    $flag = true;
    for ($outer = 0; $outer < $length && $flag; $outer++) {
        $flag = false;
        for ($inner = $length - 1; $inner > $outer; $inner--) {
            if ($arr[$inner] < $arr[$inner - 1]) {
                $temp = $arr[$inner];
                $arr[$inner] = $arr[$inner - 1];
                $arr[$inner - 1] = $temp;
                $flag = true;
            }
        }
    }
    return $arr;
}

function select($arr)
{
    $length = count($arr);
    for ($outer = 0; $outer < $length - 1; $outer++) {
        $min_index = $outer;
        for ($inner = $outer + 1; $inner < $length; $inner++) {
            if ($arr[$min_index] > $arr[$inner]) {
                $min_index = $inner;
            }
        }
        if ($min_index != $outer) {
            $temp = $arr[$outer];
            $arr[$outer] = $arr[$min_index];
            $arr[$min_index] = $temp;
        }
    }
    return $arr;
}

function insert($arr)
{
    $length = count($arr);
    for ($outer = 1; $outer < $length; $outer++) {
        if ($arr[$outer] < $arr[$outer - 1]) {
            $temp = $arr[$outer];
            for ($inner = $outer - 1; $inner >= 0 && $arr[$inner] > $temp; $inner--) {
                $arr[$inner + 1] = $arr[$inner];
            }
            $arr[$inner + 1] = $temp;
        }
    }
    return $arr;
}

function quick($arr)
{
    $length = count($arr);
    if ($length <= 1) {
        return $arr;
    }

    $index = $length >> 1;
    $left = [];
    $right = [];

    for ($i = 0; $i < $length; $i++) {
        if ($i == $index) {
            continue;
        }
        if ($arr[$i] < $arr[$index]) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }

    return array_merge(quick($left), [$arr[$index]], quick($right));
}

$length = 10000;
for ($i = 0; $i < $length; $i++) {
    $arr[] = mt_rand(1, 1000);
}


// 快速排序算法
$begin = microtime(true);
quick($arr);
$end = microtime(true);
echo "快速排序算法耗费时间：" . ($end - $begin) . PHP_EOL;

// 插入排序算法
$begin = microtime(true);
insert($arr);
$end = microtime(true);
echo "插入排序算法耗费时间：" . ($end - $begin) . PHP_EOL;

// 冒泡排序算法
$begin = microtime(true);
bubble($arr);
$end = microtime(true);
echo "冒泡排序算法耗费时间：" . ($end - $begin) . PHP_EOL;

// 选择排序算法
$begin = microtime(true);
select($arr);
$end = microtime(true);
echo "选择排序算法耗费时间：" . ($end - $begin) . PHP_EOL . PHP_EOL . PHP_EOL;
