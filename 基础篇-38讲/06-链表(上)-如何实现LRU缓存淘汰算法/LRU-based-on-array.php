<?php

// 如何基于数组实现 LRU 缓存淘汰算法？

// 我的思路是这样的：
// 我们维护一个有序数组，越靠近数组尾部的元素是越早之前访问的。
// 当有一个新的数据被访问时，我们从数组头部开始顺序遍历数组。
// 1. 如果此数据之前已经被缓存在数组中了，我们遍历得到这个数据对应的元素，并将其从原来的位置删除，然后再插入到数组的头部。
// 2. 如果此数据没有在缓存数组中，又可以分为两种情况：如果此时缓存未满，则将此元素直接插入到数组的头部；
// 如果此时缓存已满，则数组尾元素删除，将新的数据元素插入数组的头部。

// 这样我们就用数组实现了一个 LRU 缓存，是不是很简单？

function LRUOfBasedArray($accessData, &$array)
{
    // 1.维护一个数据量为100的【有序】数组
    // 缓存初始化
    $arrayMaxLength = 100;
    // $array = []; // 这里使用PHP语言来模拟不是很好的方式, 因为PHP不是常驻内存. 每次请求调用执行脚本, 之前的数据会丢失, 所以, 只能在一次脚本执行周期内做实验.

    // 2.访问数据
    $isExsited = false;
    $i = 0;
    while(isset($array[$i])){
        // 2.1.1 如果此数据已被缓存在数组中
        if($array[$i] == $accessData){
            $isExsited = true;
            // 2.1.2 将其从原来的位置删除，
            unset($array[$i]);
            // 2.1.3 然后再插入到链表的头部。
            array_unshift($array, $accessData);
            break;
        }
        $i++;
    }

    // 2.2 此数据未在缓存链表中
    if(!$isExsited){
        // 2.2.1 如果此时缓存未满，则将此结点直接插入到链表的头部；
        if(count($array) < $arrayMaxLength){
            array_unshift($array, $accessData);
        }else{ // 2.2.2 如果此时缓存已满，则链表尾结点删除，将新的数据结点插入链表的头部。
            array_pop($array);
            array_unshift($array, $accessData);
        }
    }

    var_export($array);
    print "<hr/>";
}
$array = []; // 小型内存数据库, 但是仅限于一次PHP脚本执行周期内

$requestNumber = 110;
$i = 0;
while($i++ < $requestNumber){
    LRUOfBasedArray($i, $array);
}

// Out:
// 参见 基础篇-38讲\06-链表(上)-如何实现LRU缓存淘汰算法\based-array-lru-out-result - localhost.png
