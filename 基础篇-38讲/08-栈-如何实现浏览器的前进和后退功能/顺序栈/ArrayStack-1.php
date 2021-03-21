<?php

// 基于数组实现的顺序栈  -- 使用PHP特有的函数去实现, 最大区别: count不用另外去存储
class ArrayStack1
{
  private $array = []; // 数组
  private $n; // 栈的大小

  // 默认栈内容为100
  public function __construct($n = 100)
  {
    $this->n = $n;
  }
  
  // 入栈
  public function push($item)
  {
    if($this->isFull()) return false;
    $this->array[] = $item;
    return true;
  }

  // 出栈
  public function pop()
  {
    if($this->isEmpty()) return null;
    return array_pop($this->array);
  }

  // 判空
  public function isEmpty()
  {
    return count($this->array) === 0 ? true : false;
  }

  // 判满
  public function isFull()
  {
    return count($this->array) === $this->n ? true : false;
  }

  // 栈的大小
  public function size()
  {
    return $this->count;
  }
}
