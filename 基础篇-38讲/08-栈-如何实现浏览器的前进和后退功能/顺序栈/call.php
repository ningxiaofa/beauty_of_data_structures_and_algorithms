<?php

require_once("ArrayStack.php");
require_once("ArrayStack-1.php");

$arrayStack = new ArrayStack(10);
var_export($arrayStack);
print "<hr/>";

$arrayStack->push(1);
// $arrayStack->pop();
// $arrayStack->pop(); // 栈空, 不能pop出数据
$arrayStack->push(2);
$arrayStack->push(3);
var_export($arrayStack);
print "<hr/>";

$arrayStack->pop();
var_export($arrayStack);
print "<hr/>";

$arrayStack->push(3);
$arrayStack->push(3);
$arrayStack->push(3);
$arrayStack->push(3);
$arrayStack->push(3);
$arrayStack->push(3);
$arrayStack->push(4);
$arrayStack->push(4);
$arrayStack->push(4); // 已经满了, 所以不能加入
var_export($arrayStack);
print "<hr/>";


// Out: ArrayStack
// ArrayStack::__set_state(array( 'array' => array ( ), 'count' => 0, 'n' => 10, ))

// ArrayStack::__set_state(array( 'array' => array ( 0 => 1, 1 => 2, 2 => 3, ), 'count' => 3, 'n' => 10, ))

// ArrayStack::__set_state(array( 'array' => array ( 0 => 1, 1 => 2, ), 'count' => 2, 'n' => 10, ))

// ArrayStack::__set_state(array( 'array' => array ( 0 => 1, 1 => 2, 3 => 3, 4 => 3, 5 => 3, 6 => 3, 7 => 3, 8 => 3, 9 => 4, 10 => 4, ), 'count' => 10, 'n' => 10, ))

// Out: ArrayStack1
// ArrayStack::__set_state(array( 'array' => array ( ), 'n' => 10, ))

// ArrayStack::__set_state(array( 'array' => array ( 0 => 1, 1 => 2, 2 => 3, ), 'n' => 10, ))

// ArrayStack::__set_state(array( 'array' => array ( 0 => 1, 1 => 2, ), 'n' => 10, ))

// ArrayStack::__set_state(array( 'array' => array ( 0 => 1, 1 => 2, 2 => 3, 3 => 3, 4 => 3, 5 => 3, 6 => 3, 7 => 3, 8 => 4, 9 => 4, ), 'n' => 10, ))
