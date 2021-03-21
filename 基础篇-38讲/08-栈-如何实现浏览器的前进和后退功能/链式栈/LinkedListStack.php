<?php

require_once("ListNode.php");

// 基于链表实现
class LinkedListStack
{
    private $head;
    private $count = 0;
    private $n;

    // 默认栈内容为100
    public function __construct($n = 100)
    {
        $this->n = $n;
    }

    // 入栈
    public function push($item)
    {
        if ($this->isFull()) return false;
        $newNode = new ListNode($item);
        $newNode->next = $this->head;
        $this->head = $newNode;
        $this->count++;
        return true;
    }

    // 出栈
    public function pop()
    {
        if ($this->isEmpty()) return false;
        $itemValue = $this->head->val;
        $this->head = $this->head->next;
        $this->count--;
        return $itemValue;
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
        $this->head = null;
        $this->count = 0;
    }
}
