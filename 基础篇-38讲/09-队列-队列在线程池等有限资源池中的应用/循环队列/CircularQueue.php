<?php

// 基于数组实现

class CircularQueue {
    // 数组：items，数组大小：n
    private $items = [];
    private $n = 0;

    // head表示队头下标，tail表示队尾下标
    private $head = 0;
    private $tail = 0;
  
    // 申请一个大小为capacity的数组
    public function __construct($capacity) {
      $this->n = $capacity;
    }
  
    // 入队
    public function enqueue($item) {
      // 队列满了
      if (($this->tail + 1) % $this->n == $this->head) return false;
      $this->items[$this->tail] = $item;
      $this->tail = ($this->tail + 1) % $this->n;
      return true;
    }
  
    // 出队
    public function dequeue() {
      // 如果head == tail 表示队列为空
      if ($this->head == $this->tail) return null;
      $ret = $this->items[$this->head];
      $this->head = ($this->head + 1) % $this->n;
      return $ret;
    }
  }
