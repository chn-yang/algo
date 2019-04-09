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
    public function enqueue($value)
    {
        if ($this->size == 0) {
            $this->first = new Node();
            $this->last = $this->first;
            $this->first->value = $value;
            $this->position = $this->first;
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
    public function dequeue(): int
    {
        if ($this->isEmpty()) {
            throw new Exception("Queue is null");
        }
        $value = $this->first->value;
        $this->first = $this->first->next;
        $this->size--;
        return $value;
    }
}

$queue = new Queue();
for ($i = 1; $i <= 10; $i++) {
    $queue->enqueue($i);
}

echo "length = " . $queue->length() . PHP_EOL;


for ($i = 1; $i <= 5; $i++) {
    if ($queue->length() !== 0) {
        echo $queue->dequeue() . "出队" . PHP_EOL;
    }
}


foreach ($queue as $value) {
    var_dump($value);
}