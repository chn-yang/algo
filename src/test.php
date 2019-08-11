<?php

namespace algo;

use mysql_xdevapi\Exception;

require '../vendor/autoload.php';

function queue_test()
{
    $queue = new Queue();
    for ($i = 1; $i <= 10; $i++) {
        $queue->addFirst($i);
    }

    echo "length = " . $queue->length() . PHP_EOL;


    for ($i = 1; $i <= 5; $i++) {
        if ($queue->length() !== 0) {
            echo $queue->lastPop() . "出队" . PHP_EOL;
        }
    }

    foreach ($queue as $value) {
        var_dump($value);
    }

    for ($i = 1; $i <= 5; $i++) {
        if ($queue->length() !== 0) {
            echo $queue->firstPop() . "出队" . PHP_EOL;
        }
    }

}

function queue_test2(int $n)
{
    if ($n > 10) {
        throw new \Exception("n is to big , maximize is 10");
    }

    $queue = new Queue();
    for ($i = 1; $i <= 10; $i++) {
        $tmp = mt_rand(1, 100);
        printf("(%02d) %d入队了\t", $i, $tmp);
        $queue->addLast($tmp);
    }
    echo "\n";
    for ($i = 10; $i > 0; $i--) {
        $num = $queue->lastPop();
        if ($i == $n) {
            return $num;
        }
    }
}

$n = mt_rand(1, 10);
printf("%d是倒数第%d个数,", queue_test2($n), $n);