<?php

require_once("LinkedListQueue.php");

$linkedListQueue = new LinkedListQueue();

$ret = $linkedListQueue->enqueue(1);
var_dump($ret);
print "<hr/>";
var_export($linkedListQueue);
print "<hr/>";

$ret = $linkedListQueue->enqueue(2);
var_dump($ret);
print "<hr/>";
var_export($linkedListQueue);
print "<hr/>";

$ret = $linkedListQueue->enqueue(3);
var_dump($ret);
print "<hr/>";
var_export($linkedListQueue);
print "<hr/>";

$ret = $linkedListQueue->enqueue(4);
var_dump($ret);
print "<hr/>";
var_export($linkedListQueue);
print "<hr/>";

$ret = $linkedListQueue->enqueue(5);
var_dump($ret); // false
print "<hr/>";
var_export($linkedListQueue);
print "<hr/>";

$ret = $linkedListQueue->dequeue();
var_dump($ret);
print "<hr/>";
var_export($linkedListQueue);
print "<hr/>";

$ret = $linkedListQueue->dequeue();
var_dump($ret);
print "<hr/>";
var_export($linkedListQueue);
print "<hr/>";

$ret = $linkedListQueue->enqueue(6);
var_dump($ret);
print "<hr/>";
var_export($linkedListQueue);
print "<hr/>";

$ret = $linkedListQueue->enqueue(7);
var_dump($ret); // false
print "<hr/>";
var_export($linkedListQueue);
print "<hr/>";

// Out:
// bool(true)
// LinkedListQueue::__set_state(array( 'head' => ListNode::__set_state(array( 'val' => 1, 'next' => NULL, )), 'tail' => ListNode::__set_state(array( 'val' => 1, 'next' => NULL, )), ))
// bool(true)
// LinkedListQueue::__set_state(array( 'head' => ListNode::__set_state(array( 'val' => 1, 'next' => ListNode::__set_state(array( 'val' => 2, 'next' => NULL, )), )), 'tail' => ListNode::__set_state(array( 'val' => 2, 'next' => NULL, )), ))
// bool(true)
// LinkedListQueue::__set_state(array( 'head' => ListNode::__set_state(array( 'val' => 1, 'next' => ListNode::__set_state(array( 'val' => 2, 'next' => ListNode::__set_state(array( 'val' => 3, 'next' => NULL, )), )), )), 'tail' => ListNode::__set_state(array( 'val' => 3, 'next' => NULL, )), ))
// bool(true)
// LinkedListQueue::__set_state(array( 'head' => ListNode::__set_state(array( 'val' => 1, 'next' => ListNode::__set_state(array( 'val' => 2, 'next' => ListNode::__set_state(array( 'val' => 3, 'next' => ListNode::__set_state(array( 'val' => 4, 'next' => NULL, )), )), )), )), 'tail' => ListNode::__set_state(array( 'val' => 4, 'next' => NULL, )), ))
// bool(true)
// LinkedListQueue::__set_state(array( 'head' => ListNode::__set_state(array( 'val' => 1, 'next' => ListNode::__set_state(array( 'val' => 2, 'next' => ListNode::__set_state(array( 'val' => 3, 'next' => ListNode::__set_state(array( 'val' => 4, 'next' => ListNode::__set_state(array( 'val' => 5, 'next' => NULL, )), )), )), )), )), 'tail' => ListNode::__set_state(array( 'val' => 5, 'next' => NULL, )), ))
// int(1)
// LinkedListQueue::__set_state(array( 'head' => ListNode::__set_state(array( 'val' => 2, 'next' => ListNode::__set_state(array( 'val' => 3, 'next' => ListNode::__set_state(array( 'val' => 4, 'next' => ListNode::__set_state(array( 'val' => 5, 'next' => NULL, )), )), )), )), 'tail' => ListNode::__set_state(array( 'val' => 5, 'next' => NULL, )), ))
// int(2)
// LinkedListQueue::__set_state(array( 'head' => ListNode::__set_state(array( 'val' => 3, 'next' => ListNode::__set_state(array( 'val' => 4, 'next' => ListNode::__set_state(array( 'val' => 5, 'next' => NULL, )), )), )), 'tail' => ListNode::__set_state(array( 'val' => 5, 'next' => NULL, )), ))
// bool(true)
// LinkedListQueue::__set_state(array( 'head' => ListNode::__set_state(array( 'val' => 3, 'next' => ListNode::__set_state(array( 'val' => 4, 'next' => ListNode::__set_state(array( 'val' => 5, 'next' => ListNode::__set_state(array( 'val' => 6, 'next' => NULL, )), )), )), )), 'tail' => ListNode::__set_state(array( 'val' => 6, 'next' => NULL, )), ))
// bool(true)
// LinkedListQueue::__set_state(array( 'head' => ListNode::__set_state(array( 'val' => 3, 'next' => ListNode::__set_state(array( 'val' => 4, 'next' => ListNode::__set_state(array( 'val' => 5, 'next' => ListNode::__set_state(array( 'val' => 6, 'next' => ListNode::__set_state(array( 'val' => 7, 'next' => NULL, )), )), )), )), )), 'tail' => ListNode::__set_state(array( 'val' => 7, 'next' => NULL, )), ))
