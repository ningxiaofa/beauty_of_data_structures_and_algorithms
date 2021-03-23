<?php

// 09 | 队列：队列在线程池等有限资源池中的应用 -- https://time.geekbang.org/column/article/41330

// 跟栈一样，队列可以用数组来实现，也可以用链表来实现。用数组实现的栈叫作顺序栈，用链表实现的栈叫作链式栈。
// 同样，用数组实现的队列叫作顺序队列，用链表实现的队列叫作链式队列。

// 用数组实现的队列
class ArrayQueue
{
    // 数组：items，数组大小：n
    private $items = [];
    private $n = 0;
    // head表示队头下标，tail表示队尾下标  
    private $head = 0;
    private $tail = 0;

    public function __construct($n)
    {
        $this->n = $n;
    }

    // 入队
    public function enqueue($item)
    {
        // 如果tail == n 表示队列已经满了    
        if ($this->tail === $this->n) return false;    
        $this->items[$this->tail] = $item;
        ++$this->tail;
        return true;
    }

    // 出队
    public function dequeue(){
        // 如果head == tail 表示队列为空
        if($this->head === $this->tail) return null;
        $item = $this->items[$this->head]; 
        // 显式删除元素, 但是不推荐
        // unset($this->items[$this->head]);
        ++$this->head;
        return $item;
    }
}