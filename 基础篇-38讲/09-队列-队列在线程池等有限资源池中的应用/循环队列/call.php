<?php

require_once("CircularQueue.php");

$circularQueue = new CircularQueue(4);

$ret = $circularQueue->enqueue(1);
var_dump($ret);
print "<hr/>";
var_export($circularQueue);
print "<hr/>";

$ret = $circularQueue->enqueue(2);
var_dump($ret);
print "<hr/>";
var_export($circularQueue);
print "<hr/>";

$ret = $circularQueue->enqueue(3);
var_dump($ret);
print "<hr/>";
var_export($circularQueue);
print "<hr/>";

// exit;

$ret = $circularQueue->enqueue(4);
var_dump($ret); // bool(false)  循环队列已满
print "<hr/>";
var_export($circularQueue);
print "<hr/>";

$ret = $circularQueue->dequeue();
var_dump($ret);
print "<hr/>";
var_export($circularQueue);
print "<hr/>";

$ret = $circularQueue->dequeue();
var_dump($ret);
print "<hr/>";
var_export($circularQueue);
print "<hr/>";

$ret = $circularQueue->enqueue(6);
var_dump($ret);
print "<hr/>";
var_export($circularQueue);
print "<hr/>";

$ret = $circularQueue->enqueue(7);
var_dump($ret);
print "<hr/>";
var_export($circularQueue);
print "<hr/>";

$ret = $circularQueue->enqueue(8);
var_dump($ret); // false 循环队列已满
print "<hr/>";
var_export($circularQueue);
print "<hr/>";

// Out:
// bool(true)
// CircularQueue::__set_state(array( 'items' => array ( 0 => 1, ), 'n' => 4, 'head' => 0, 'tail' => 1, ))
// bool(true)
// CircularQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, ), 'n' => 4, 'head' => 0, 'tail' => 2, ))
// bool(true)
// CircularQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, 2 => 3, ), 'n' => 4, 'head' => 0, 'tail' => 3, ))
// bool(false)
// CircularQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, 2 => 3, ), 'n' => 4, 'head' => 0, 'tail' => 3, ))
// int(1)
// CircularQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, 2 => 3, ), 'n' => 4, 'head' => 1, 'tail' => 3, ))
// int(2)
// CircularQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, 2 => 3, ), 'n' => 4, 'head' => 2, 'tail' => 3, ))
// bool(true)
// CircularQueue::__set_state(array( 'items' => array ( 0 => 1, 1 => 2, 2 => 3, 3 => 6, ), 'n' => 4, 'head' => 2, 'tail' => 0, ))
// bool(true)
// CircularQueue::__set_state(array( 'items' => array ( 0 => 7, 1 => 2, 2 => 3, 3 => 6, ), 'n' => 4, 'head' => 2, 'tail' => 1, ))
// bool(false)
// CircularQueue::__set_state(array( 'items' => array ( 0 => 7, 1 => 2, 2 => 3, 3 => 6, ), 'n' => 4, 'head' => 2, 'tail' => 1, ))
