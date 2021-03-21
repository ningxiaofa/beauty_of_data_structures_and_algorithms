<?php

// https://time.geekbang.org/column/article/41222
// 在入栈和出栈过程中，只需要一两个临时变量存储空间，所以空间复杂度是 O(1)。
// 不管是顺序栈还是链式栈，入栈、出栈只涉及栈顶个别数据的操作，所以时间复杂度都是 O(1)。

// 基于数组实现的顺序栈 
class ArrayStack
{
  private $array = []; // 数组
  private $count = 0; // 栈中元素个数 --- 本来可以通过count()函数来实时获取, 但是这个办法, 应该性能方面应该会更好一些, TBD[PHP关于数组的实现细节]
  private $n; // 栈的大小

  // 默认栈内容为100
  public function __construct($n = 100)
  {
    $this->n = $n;
  }

  // 入栈
  public function push($item)
  {
    if ($this->isFull()) return false;
    $this->array[$this->count] = $item; // 如此写, 便用在出栈时, 再释放该元素 -- 方式一 2-1
    // 如果是直接添加尾部
    // $this->array[] = $item;
    // 则在pop中, 要执行 unset($this->array[$this->count -1]);
    $this->count++;
    return true;
  }

  // 出栈
  public function pop()
  {
    if ($this->isEmpty()) return null;
    $item = $this->array[$this->count - 1];
    unset($this->array[$this->count - 1]);  // 不用显示释放, 后面入栈时, 会覆盖 -- 方式一 2-1 不过在学习的时候,还是建议释放
    $this->count--;
    return $item;
  }

  // 判空
  public function isEmpty()
  {
    return $this->count === 0 ? true : false;
  }

  // 判满
  public function isFull()
  {
    return $this->count === $this->n ? true : false;
  }

  // 栈的大小
  public function size()
  {
    return $this->count;
  }

  // 清空栈
  public function clear()
  {
    $this->array = [];
    $this->count = 0;
  }

  // 返回栈顶元素, 但不出栈
  public function peek()
  {
    if ($this->isEmpty()) return null;
    return $this->array[$this->count -1];
  }
}
