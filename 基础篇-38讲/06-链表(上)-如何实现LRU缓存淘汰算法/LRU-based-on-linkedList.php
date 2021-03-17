<?php

// 如何基于链表实现 LRU 缓存淘汰算法？

// 我的思路是这样的：
// 我们维护一个有序单链表，越靠近链表尾部的结点是越早之前访问的。
// 当有一个新的数据被访问时，我们从链表头开始顺序遍历链表。
// 1. 如果此数据之前已经被缓存在链表中了，我们遍历得到这个数据对应的结点，并将其从原来的位置删除，然后再插入到链表的头部。
// 2. 如果此数据没有在缓存链表中，又可以分为两种情况：如果此时缓存未满，则将此结点直接插入到链表的头部；
// 如果此时缓存已满，则链表尾结点删除，将新的数据结点插入链表的头部。

// 这样我们就用链表实现了一个 LRU 缓存，是不是很简单？

// require_once('ListNode.php');
require_once('constructLinkedList.php');

function LRUOfBasedLinkedList($linkedList, $accessData, $linkedListCurrLength)
{
    // 1.维护一个数据量为100的【有序】单链表
    // 缓存初始化
    $linkedListMaxLength = 100;

    if($linkedListCurrLength > $linkedListMaxLength){
        throw new Exception('缓存异常, 超出最大值');
    }

    // 处理边界问题: 没有节点[没有缓存数据]
    $newNode = new ListNode($accessData);
    if($linkedList == null){
        $newNode->next = $linkedList;
        return [$newNode, ++$linkedListCurrLength];
    }

    // 哨兵
    $firstNode = new ListNode(-1);
    $firstNode->next = $linkedList;
    
    // 2.访问数据
    $isExsited = false;
    while($linkedList->next){
        // 2.1.1 如果此数据已被缓存在链表中
        if($linkedList->next->val == $accessData){
            $isExsited = true;
            // 2.1.2 将其从原来的位置删除，
            $existedNode = $linkedList->next; // 记录下已经存在的节点
            $linkedList->next = $linkedList->next->next;
            break;
        }
        
        $linkedList = $linkedList->next;
    }

    if($isExsited){
        // 2.1.3 然后再插入到链表的头部。 $existedNode是新的头节点
        $existedNode->next = $firstNode->next;
        return [$existedNode, $linkedListCurrLength];
    }else{
        // 2.2 此数据未在缓存链表中
        // 2.2.1 如果此时缓存未满，则将此结点直接插入到链表的头部；
        if($linkedListCurrLength < $linkedListMaxLength){
            $newNode->next = $firstNode->next;
            $linkedListCurrLength++;
        }else{ // 2.2.2 如果此时缓存已满，则链表尾结点删除，将新的数据结点插入链表的头部。
            $newNode->next = $firstNode->next;
            // 删除尾节点
            deleteEndNode($linkedListMaxLength, $firstNode->next);
        }
        return [$newNode, $linkedListCurrLength];
    }
}

// 删除尾节点
function deleteEndNode($linkedListMaxLength, $linkedList)
{
    while($linkedListMaxLength-- > 2){
        $linkedList = $linkedList->next;
    }

    // 删除尾节点
    $linkedList->next = null;
}

// 这里的节点数: 相当于一个小型内存数据库, 模拟当前缓存数量
// 边界问题: 没有节点, 即没有缓存数据
// 测试用例
// []
// 2
// 1
$mockLinkedList = null; // null
var_export($mockLinkedList);
print "<hr/>";
list($ret, $length) = LRUOfBasedLinkedList($mockLinkedList, 2, 0); // 访问 2
var_export($ret);
print "<hr/>";
list($ret, $length) = LRUOfBasedLinkedList($ret, 1, $length); // 再次访问 1
var_export($ret);
print "<hr/>";
// exit;

// 这里的节点数: 相当于一个小型内存数据库, 模拟当前缓存数量
// 边界问题: 只有一个节点
// 测试用例
// [1]
// 2
// 1
$mockLinkedList = constructNodeList(1); // 1
var_export($mockLinkedList);
print "<hr/>";
list($ret, $length) = LRUOfBasedLinkedList($mockLinkedList, 2, 1); // 访问 2
var_export($ret);
print "<hr/>";
list($ret, $length) = LRUOfBasedLinkedList($ret, 1, $length); // 再次访问 1
var_export($ret);
print "<hr/>";

 // 边界问题: 只有两个节点
 // 测试用例
//  [1,2]
//  2
//  1
$mockLinkedList = constructNodeList(2); //  1, 2
list($ret, $length) = LRUOfBasedLinkedList($mockLinkedList, 2, 2); // 访问 2
var_export($ret);
print "<hr/>";
list($ret, $length) = LRUOfBasedLinkedList($ret, 1, $length); // 再次访问 1
var_export($ret);
print "<hr/>";
// exit;

// 非边界问题: 多个节点, 但是刚满最大缓存容量, 且访问已经存在的节点
// 测试用例
// [1,2,3,4,5, ..., 100]
// 100
// 2
$mockLinkedList = constructNodeList(100); //  1, 2, ... , 100
list($ret, $length) = LRUOfBasedLinkedList($mockLinkedList, 100, 100); // 访问 100
var_export($ret);
print "<hr/>";
list($ret, $length) = LRUOfBasedLinkedList($ret, 2, $length); // 访问 2
var_export($ret);
print "<hr/>";

// 非边界问题: 多个节点, 但是已满最大缓存容量, 且不在缓存列表中 
// ---- 存在问题, 当大于最大缓存数量, 出现问题, 最大限制不生效.
// ---- 解决方式: 传入当前缓存长度, 然后比较, 如果当前缓存长度大于最大缓存大小, 说明出现bug, 则抛出异常.

// 测试用例
// [1,2,3,4,5, ..., 100]
// 100
// 2
// $mockLinkedList = constructNodeList(101); //  1, 2, ... , 100
// list($ret, $length) = LRUOfBasedLinkedList($mockLinkedList, 110, 101); // 访问 100
// var_export($ret);
// print "<hr/>";
// list($ret, $length) = LRUOfBasedLinkedList($ret, 2, $length); // 访问 2
// var_export($ret);
// print "<hr/>";

// 后续应该优化封装成:类 TBD
