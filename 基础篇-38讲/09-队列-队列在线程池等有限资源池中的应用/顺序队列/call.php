<?php

require_once("ArrayQueue.php");

$arrayQueue = new ArrayQueue(4);

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

$ret = $arrayQueue->enqueue(5);
var_dump($ret); // false
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

$ret = $arrayQueue->enqueue(6);
var_dump($ret);
print "<hr/>";
var_export($arrayQueue);
print "<hr/>";

$ret = $arrayQueue->enqueue(7);
var_dump($ret); // false
print "<hr/>";
var_export($arrayQueue);
print "<hr/>";

// Out: 没有显式删除元素
// bool(true)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, ), 'n' => 4, 'head' => 0, 'tail' => 1, ))
// bool(true)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, ), 'n' => 4, 'head' => 0, 'tail' => 2, ))
// bool(true)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, 2 => 3, ), 'n' => 4, 'head' => 0, 'tail' => 3, ))
// bool(true)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, 2 => 3, 3 => 4, ), 'n' => 4, 'head' => 0, 'tail' => 4, ))
// bool(false)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, 2 => 3, 3 => 4, ), 'n' => 4, 'head' => 0, 'tail' => 4, ))
// int(1)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, 2 => 3, 3 => 4, ), 'n' => 4, 'head' => 1, 'tail' => 4, ))
// int(2)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, 2 => 3, 3 => 4, ), 'n' => 4, 'head' => 2, 'tail' => 4, ))
// bool(true)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 3, 1 => 4, 2 => 3, 3 => 4, 4 => 6, ), 'n' => 4, 'head' => 0, 'tail' => 5, ))
// bool(true)
// ArrayQueue::__set_state(array( 'items' => array ( 0 => 3, 1 => 4, 2 => 3, 3 => 4, 4 => 6, 5 => 7, ), 'n' => 4, 'head' => 0, 'tail' => 6, ))

// Out: 显式删除元素  --- 不涉及数据搬移的时候， 上面的输出结果已经涉及到数据搬移
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
