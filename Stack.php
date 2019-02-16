<?php

class Node
{
    public $prev;
    public $next;
    public $value;
}

class Stack implements Iterator
{
    private $last;
    private $size;

    public function __construct()
    {
        $this->position = null;
    }

    public function rewind()
    {
        $this->position = $this->last;
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
        $this->position = $this->position->prev;
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
     * 入栈操作,首节点插入值, 迭代position指向首节点
     * 如果不是首节点,oldlast->next指向last,last->prev指向oldlast
     */
    public function push($value)
    {
        
        if ($this->size == 0) { 
            $this->last = new Node();
            $this->last->value = $value;
            $this->position = $this->last;
        } else {
            $oldlast = $this->last;
            $this->last = new Node();
            $this->last->value = $value;
            $this->last->prev = $oldlast;
            $oldlast->next = $this->last;
        }
        $this->size++;
        return true;
    }

    /**
     * 出栈操作, 栈为空返回异常
     * last指向last->prev
     */
    public function pop(): int
    {
        if ($this->isEmpty()) {
            throw new \Exception("Stack is null");
        }
        $value = $this->last->value;
        $this->last = $this->last->prev;
        $this->size--;
        return $value;
    }
}

$stack = new Stack();
for ($i = 1; $i <= 5; $i++) {
    $stack->push($i);
}

echo "length = " . $stack->length() . PHP_EOL;

foreach ($stack as $value) {
    var_dump($value);
}

for ($i = 1; $i <= 5; $i++) {
    if ($stack->length() !== 0) {
        echo $stack->pop() . PHP_EOL;
    }
}
