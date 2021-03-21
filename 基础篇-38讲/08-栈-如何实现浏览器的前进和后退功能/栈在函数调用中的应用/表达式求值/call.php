<?php

require_once("ExpressionEvaluation.php");

$testExpresstion = "3+5"; //int(8) 通过
$testExpresstion = "3-2"; //int(1) 通过
$testExpresstion = "3*2"; //int(6) 通过
$testExpresstion = "3/2"; //float(1.5) 通过
$testExpresstion = "13+56-6"; //int(63) 通过
$testExpresstion = "3+5+8+2+3-1";  // int(20) 通过
$testExpresstion = "3+5*8"; //int(43) 通过
$testExpresstion = "3+5*8 -6 "; //int(37) 通过
$testExpresstion = "3 + 125 * 8 - 6 "; //int(997) 通过
$testExpresstion = "3 + 125 * 8 - 6 / 2"; //int(1000) 通过
$testExpresstion = "3 + 125 * 8 - 10 / 3"; //float(1002.6666666667) 通过

$expressionEvaluation = new ExpressionEvaluation();
$ret = $expressionEvaluation->elvaluate($testExpresstion);
var_dump($ret);
