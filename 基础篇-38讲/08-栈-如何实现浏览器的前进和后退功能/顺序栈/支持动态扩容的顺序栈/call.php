<?php

require_once("LinkedListStack.php");

$linkedListStack = new LinkedListStack(10);
var_export($linkedListStack);
print "<hr/>";

$linkedListStack->push(1);
// $linkedListStack->pop();
// $linkedListStack->pop(); // 栈空, 不能pop出数据
$linkedListStack->push(2);
$linkedListStack->push(3);
var_export($linkedListStack);
print "<hr/>";

$linkedListStack->pop();
var_export($linkedListStack);
print "<hr/>";

$linkedListStack->push(3);
$linkedListStack->push(3);
$linkedListStack->push(3);
$linkedListStack->push(3);
$linkedListStack->push(3);
$linkedListStack->push(3);
$linkedListStack->push(4);
$linkedListStack->push(4);
$linkedListStack->push(4); // 已经满了, 所以不能加入  --- 至于链表的扩容是本身就支持的, 但是这里加了限制
var_export($linkedListStack);
print "<hr/>";

// Out:
// LinkedListStack::__set_state(array( 'head' => NULL, 'count' => 0, 'n' => 10, ))

// LinkedListStack::__set_state(array( 'head' => ListNode::__set_state(array( 'val' => 3, 'next' => ListNode::__set_state(array( 'val' => 2, 'next' => ListNode::__set_state(array( 'val' => 1, 'next' => NULL, )), )), )), 'count' => 3, 'n' => 10, ))

// LinkedListStack::__set_state(array( 'head' => ListNode::__set_state(array( 'val' => 2, 'next' => ListNode::__set_state(array( 'val' => 1, 'next' => NULL, )), )), 'count' => 2, 'n' => 10, ))

// LinkedListStack::__set_state(array( 'head' => ListNode::__set_state(array( 'val' => 4, 'next' => ListNode::__set_state(array( 'val' => 4, 'next' => ListNode::__set_state(array( 'val' => 3, 'next' => ListNode::__set_state(array( 'val' => 3, 'next' => ListNode::__set_state(array( 'val' => 3, 'next' => ListNode::__set_state(array( 'val' => 3, 'next' => ListNode::__set_state(array( 'val' => 3, 'next' => ListNode::__set_state(array( 'val' => 3, 'next' => ListNode::__set_state(array( 'val' => 2, 'next' => ListNode::__set_state(array( 'val' => 1, 'next' => NULL, )), )), )), )), )), )), )), )), )), )), 'count' => 10, 'n' => 10, ))