<?php

/**
 * use: removeDuplicates([0, 1, 2, 2, 3, 3]);
 * @desc 双指针去重数组
 */
function removeDuplicates(array $arr) {
	$len = count($arr);
	if ($len == 0) {
		return 0;
	}
	$slow = 0;
	$fast = 1;
	while ($fast < $len) {
		if ($arr[$fast] != $arr[$slow]) {
			++$slow;
			$arr[$slow] = $arr[$fast];
		}
		++$fast;
	}
	print_r($arr);
	return $slow + 1;
}
