<?php

// 基于链表的队列实现方法。

// 实现思路
// 基于链表的实现，我们同样需要两个指针：head 指针和 tail 指针。
// 它们分别指向链表的第一个结点和最后一个结点。
// 如图所示，入队时，tail->next= new_node, tail = tail->next；
// 出队时，head = head->next。我将具体的代码放到 GitHub 上，你可以自己试着实现一下，
// 然后再去 GitHub 上跟我实现的代码对比下，看写得对不对。

require_once("ListNode.php");

class LinkedListQueue
{
    // 头指针，尾指针
    private $head = null;
    private $tail = null;

    // 入队
    public function enqueue($item)
    {
        $listNode = new ListNode($item);

        // 不存在队满的情况，链式队列本身就是无界队列
        if ($this->head == null) {
            $this->head = $listNode;
            $this->tail = $listNode;
        } else {
            $this->tail->next = $listNode;
            $this->tail = $listNode;
        }

        return true;
    }

    // 出队
    public function dequeue()
    {
        // 队空
        if($this->head === $this->tail) return null;
        $item = $this->head->val;
        $this->head = $this->head->next;
        return $item;
    }
}
