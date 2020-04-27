<?php

/**
 * @author labuladong
 * @link https://github.com/labuladong/fucking-algorithm
 */


function left_bound($nums, $target)
{
    $length = count($nums);
    $left = 0;
    $right = $length - 1;
    while ($left <= $right) {
        $mid = (int) ($left + ($right - $left) / 2);
        if ($nums[$mid] < $target) {
            $left = $mid + 1;
        } else if ($nums[$mid] > $target) {
            $right = $mid - 1;
        } else if ($nums[$mid] == $target) {
            // 别返回，锁定左侧边界
            $right = $mid - 1;
        }
    }
    // 最后要检查 $left 越界的情况
    if ($left >= $length || $nums[$left] != $target) {
        return -1;
    }
    return $left;
}

function right_bound($nums, $target)
{
    $length = count($nums);
    $left = 0;
    $right = $length - 1;
    while ($left <= $right) {
        $mid = (int) ($left + ($right - $left) / 2);
        if ($nums[$mid] < $target) {
            $left = $mid + 1;
        } else if ($nums[$mid] > $target) {
            $right = $mid - 1;
        } else if ($nums[$mid] == $target) {
            // 别返回，锁定右侧边界
            $left = $mid + 1;
        }
    }
    // 最后要检查 $right 越界的情况
    if ($right >= $length || $nums[$right] != $target) {
        return -1;
    }

    return $right;
}

function binary_search($nums, $target)
{
    $length = count($nums);
    $left = 0;
    $right = $length - 1;
    while ($left <= $right) {
        $mid = (int) ($left + ($right - $left) / 2);
        if ($nums[$mid] < $target) {
            $left = $mid + 1;
        } else if ($nums[$mid] > $target) {
            $right = $mid - 1;
        } else if ($nums[$mid] == $target) {
            return $mid;
        }
    }
    return -1;
}
