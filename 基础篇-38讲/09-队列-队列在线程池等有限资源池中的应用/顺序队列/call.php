<?php

require_once("ArrayQueue.php");

$arrayQueue = new ArrayQueue(10);

$ret = $arrayQueue->enqueue(1);
var_dump($ret);
print "<hr/>";
var_export($arrayQueue);
print "<hr/>";

$ret = $arrayQueue->enqueue(2);
var_dump($ret);
print "<hr/>";
var_export($arrayQueue);
print "<hr/>";

$ret = $arrayQueue->enqueue(3);
var_dump($ret);
print "<hr/>";
var_export($arrayQueue);
print "<hr/>";

$ret = $arrayQueue->enqueue(4);
var_dump($ret);
print "<hr/>";
var_export($arrayQueue);
print "<hr/>";

$ret = $arrayQueue->dequeue();
var_dump($ret);
print "<hr/>";
var_export($arrayQueue);
print "<hr/>";

$ret = $arrayQueue->dequeue();
var_dump($ret);
print "<hr/>";
var_export($arrayQueue);
print "<hr/>";

// Out: 没有显式删除元素
// bool(true)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, ), 'n' => 10, 'head' => 0, 'tail' => 1, ))
// bool(true)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, ), 'n' => 10, 'head' => 0, 'tail' => 2, ))
// bool(true)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, 2 => 3, ), 'n' => 10, 'head' => 0, 'tail' => 3, ))
// bool(true)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, 2 => 3, 3 => 4, ), 'n' => 10, 'head' => 0, 'tail' => 4, ))
// int(1)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, 2 => 3, 3 => 4, ), 'n' => 10, 'head' => 1, 'tail' => 4, ))
// int(2)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, 2 => 3, 3 => 4, ), 'n' => 10, 'head' => 2, 'tail' => 4, ))

// Out: 显式删除元素
// bool(true)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, ), 'n' => 10, 'head' => 0, 'tail' => 1, ))
// bool(true)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, ), 'n' => 10, 'head' => 0, 'tail' => 2, ))
// bool(true)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, 2 => 3, ), 'n' => 10, 'head' => 0, 'tail' => 3, ))
// bool(true)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, 2 => 3, 3 => 4, ), 'n' => 10, 'head' => 0, 'tail' => 4, ))
// int(1)
// ArrayQueue::__set_state(array( 'items' => array ( 1 => 2, 2 => 3, 3 => 4, ), 'n' => 10, 'head' => 1, 'tail' => 4, ))
// int(2)
// ArrayQueue::__set_state(array( 'items' => array ( 2 => 3, 3 => 4, ), 'n' => 10, 'head' => 2, 'tail' => 4, ))
