<?php

require_once('ForwardAndBackwardBrowsers.php');

// 初始化为空白页面
$forwardAndBackwardBrowsers = new ForwardAndBackwardBrowsers();

// 访问A页面
$page = $forwardAndBackwardBrowsers->forward('A');
var_export($page); // 'A'
print "<hr/>";

// 继续访问B页面
$page = $forwardAndBackwardBrowsers->forward('B');
var_export($page); // 'B'
print "<hr/>";

// 继续访问C页面
$page = $forwardAndBackwardBrowsers->forward('C');
var_export($page); // 'C'
print "<hr/>";

// 后退到B页面
$page = $forwardAndBackwardBrowsers->back();
var_export($page); // 'B'
print "<hr/>";

// 后退到A页面
$page = $forwardAndBackwardBrowsers->back();
var_export($page); // 'A'
print "<hr/>";

// 再后退, 到原始页面
$page = $forwardAndBackwardBrowsers->back();
var_export($page); // NULL
print "<hr/>";

// 再后退
// $page = $forwardAndBackwardBrowsers->back();
// var_export($page); // Fatal error: Uncaught Exception: 不能再后退
// print "<hr/>";

// 前进到A页面  -- 当forward的第二个参数为false时, 第一个参数的值, 可任意.
$page = $forwardAndBackwardBrowsers->forward('A', false);
var_export($page); // NULL
print "<hr/>";

// 前进到B页面
$page = $forwardAndBackwardBrowsers->forward('B', false);
var_export($page); // NULL
print "<hr/>";

// 新开D页面
$page = $forwardAndBackwardBrowsers->forward('D');
var_export($page); // NULL
print "<hr/>";

// 继续前进页面
// $page = $forwardAndBackwardBrowsers->forward('E', false);
// var_export($page); // Fatal error: Uncaught Exception: 无法再前进页面可用
// print "<hr/>";

// 新开F页面
$page = $forwardAndBackwardBrowsers->forward('F');
var_export($page); // NULL
print "<hr/>";

// Out:
// 'A'
// 'B'
// 'C'
// 'B'
// 'A'
// NULL
// 'A'
// 'B'
// 'D'
// 'F'
