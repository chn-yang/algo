<?php

class Node
{
    public $prev;
    public $next;
    public $value;
}

class Queue implements Iterator
{
    private $position;
    private $first;
    private $last;
    private $size;

    public function __construct()
    {
        $this->position = null;
    }

    public function rewind()
    {
        $this->position = $this->first;
    }

    public function current()
    {
        return $this->position->value;
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position = $this->position->next;
    }

    public function valid()
    {
        return isset($this->position->value);
    }

    public function isEmpty(): int
    {
        return $this->size === 0;
    }

    public function length(): int
    {
        return $this->size;
    }

    /**
     * 入队操作,首节点last指向自己, 迭代position指向首节点
     * 非首节点,存储last的引用, last->prev指向oldLast
     * oldLast->next指向last
     */
    public function addFirst($value)
    {
        if ($this->size == 0) {
            $this->addFirstNode($value);
        } else {
            $oldFirst = $this->first;
            $this->first = new Node();
            $this->first->value = $value;
            $this->first->next = $oldFirst;
            $oldFirst->prev = $this->first;
        }
        $this->size++;
        return true;
    }

    public function addLast($value)
    {
        if ($this->size == 0) {
            $this->addFirstNode($value);
        } else {
            $oldLast = $this->last;
            $this->last = new Node();
            $this->last->value = $value;
            $this->last->prev = $oldLast;
            $oldLast->next = $this->last;
        }
        $this->size++;
        return true;
    }

    /**
     * 出队操作, 队列为空返回异常, first指向first->next
     * @throws Exception
     */
    public function lastPop(): int
    {
        if ($this->isEmpty()) {
            throw new Exception("Queue is empty");
        }
        $value = $this->first->value;
        $this->first = $this->first->next;
        $this->size--;
        return $value;
    }

    public function firstPop(): int
    {
        if ($this->isEmpty()) {
            throw new Exception("Queue is empty");
        }
        $value = $this->last->value;
        $this->last = $this->last->prev;
        $this->size--;
        return $value;
    }

    private function addFirstNode($value)
    {
        $this->first = new Node();
        $this->last = $this->first;
        $this->first->value = $value;
        $this->position = $this->first;
    }
}

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
