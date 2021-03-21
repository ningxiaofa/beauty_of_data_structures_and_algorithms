<?php

require_once("isValid.php");

// valid test cases
$testString = "[]"; // bool(true)
$testString = "{}";
$testString = "()";
$testString = "[[]]";
$testString = "[{}]";
$testString = "[()]";
$testString = "[({})]";
$testString = "[{}()]";
$testString = "{}()[]";

// // invalid test cases
$testString = "["; // bool(false)
$testString = "]";
$testString = "{";
$testString = "}";
$testString = "(";
$testString = ")";
$testString = "([)]";
$testString = "[[{}]";
$testString = "[({)}]";
$testString = "[({})]]";

$isValid = new IsValid();
// $ret = $isValid->check($testString);
$ret = $isValid->isValidByStack($testString);
var_dump($ret);
