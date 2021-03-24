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
        // if ($this->tail === $this->n) return false; // 注释改行，优化代码，因为此时数组中还有空间可用
        if ($this->tail === $this->n) {
            // $this->tail为n, $this->head为0，说明确实已经满了
            if ($this->head === 0) return false;
            // 数据搬移
            for ($i = $this->head; $i < $this->tail; $i++) {
                $this->items[$i - $this->head] = $this->items[$i];
            }
            // 搬移完之后, 重新更新head, tail
            $this->head = 0;
            $this->tail -= $this->head;
        }

        $this->items[$this->tail] = $item;
        ++$this->tail;
        return true;
    }

    // 出队
    public function dequeue()
    {
        // 如果head == tail 表示队列为空
        if ($this->head === $this->tail) return null;
        $item = $this->items[$this->head];
        // 显式删除元素, 但是不推荐
        // unset($this->items[$this->head]); // 当涉及到数据搬移，这行代码不能使用，否则出错
        ++$this->head;
        return $item;
    }
}
