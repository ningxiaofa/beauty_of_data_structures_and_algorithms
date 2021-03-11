<?php

// 如何基于链表实现 LRU 缓存淘汰算法？

// 我的思路是这样的：
// 我们维护一个有序单链表，越靠近链表尾部的结点是越早之前访问的。
// 当有一个新的数据被访问时，我们从链表头开始顺序遍历链表。
// 1. 如果此数据之前已经被缓存在链表中了，我们遍历得到这个数据对应的结点，并将其从原来的位置删除，然后再插入到链表的头部。
// 2. 如果此数据没有在缓存链表中，又可以分为两种情况：如果此时缓存未满，则将此结点直接插入到链表的头部；
// 如果此时缓存已满，则链表尾结点删除，将新的数据结点插入链表的头部。

// 这样我们就用链表实现了一个 LRU 缓存，是不是很简单？

require_once('ListNode.php');

// 1.维护一个数据量为100的【有序】单链表
// 缓存初始化
$linkedListMaxLength = 100;
$linkedListCurrLength = 0;
$linkedList = new ListNode(0, null);

// 2.访问数据
$isExsited = false;
while($linkedList->next){
    // 2.1.1 如果此数据已被缓存在链表中
    if($linkedList->next->val == $accessData){
        $isExsited = true;
        // 2.1.2 将其从原来的位置删除，
        $linkedList->next = $linkedList->next->next;
        // 2.1.3 然后再插入到链表的头部。
        // TBD
        break;
    }
    
    $linkedList = $linkedList->next;
}

// 2.2 此数据未在缓存链表中
if(!$isExsited){
    // 2.2.1 如果此时缓存未满，则将此结点直接插入到链表的头部；
    if($linkedListCurrLength < $linkedListMaxLength){
        // TBD
        $linkedListCurrLength++;
    }else{ // 2.2.2 如果此时缓存已满，则链表尾结点删除，将新的数据结点插入链表的头部。
        // TBD
    }
    
}

// $node5 = new ListNode(5, null);
// $node4 = new ListNode(4, $node5);
// $node3 = new ListNode(3, $node4);
// $node2 = new ListNode(2 , $node3);
// $node1 = new ListNode(1, $node2);
// var_dump($node1);
