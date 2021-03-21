<?php

// 本来php的数组是自带扩容功能的, 但是这里还是模拟实现 手动扩容

// 思路: 当数组空间不够时，我们就重新申请一块更大的内存，将原来数组中数据统统拷贝过去。这样就实现了一个支持动态扩容的数组。

// 均摊时间复杂度一般都等于最好[其实也可能是最坏]情况时间复杂度。因为在大部分情况下，入栈操作的时间复杂度 O 都是 O(1)，只有在个别时刻才会退化为 O(n)，所以把耗时多的入栈操作的时间均摊到其他入栈操作上，平均情况下的耗时就接近 O(1)。

class DynamicCapacityArrayStack
{
    private $array = []; // 数组
    private $n; // 栈的大小

    // 默认栈内容为100
    public function __construct($n = 100)
    {
        $this->n = $n;
    }

    public function push($item)
    {
        if (count($this->array) == $this->n) {
            // return false;
            // 动态扩容
            // $this->n *= 2;
            // 申请内存
            $newArray = []; // 容量是原容器的两倍
            // 拷贝数据到新的容器中
            for ($i = 0; $i < $this->n; $i++) {
                $newArray[] = $this->array[$i];
            }
            // 然后将新的容器赋值为赋值变量数组
            $this->array = $newArray;
        }
        $this->array[] = $item;
        return true;
    }

    public function pop()
    {
        if (count($this->array) === 0) return null;
        return array_pop($this->array);
    }

    // 判空
    public function isEmpty()
    {
        return $this->count === 0 ? true : false;
    }

    // 判满
    public function isFull()
    {
        return $this->count === $this->n ? true : false;
    }

    // 栈的大小
    public function size()
    {
        return $this->count;
    }

    // 清空栈
    public function clear()
    {
        $this->array = [];
        $this->count = 0;
    }

    // 返回栈顶元素, 但不出栈
    public function peek()
    {
        if ($this->isEmpty()) return null;
        return $this->array[$this->count - 1];
    }
}


$arrayStack = new DynamicCapacityArrayStack(10);
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
$arrayStack->push(4); // 自动扩容, 所以可加入
var_export($arrayStack);
print "<hr/>";

// Out:
// DynamicCapacityArrayStack::__set_state(array( 'array' => array ( ), 'n' => 10, ))

// DynamicCapacityArrayStack::__set_state(array( 'array' => array ( 0 => 1, 1 => 2, 2 => 3, ), 'n' => 10, ))

// DynamicCapacityArrayStack::__set_state(array( 'array' => array ( 0 => 1, 1 => 2, ), 'n' => 10, ))

// DynamicCapacityArrayStack::__set_state(array( 'array' => array ( 0 => 1, 1 => 2, 2 => 3, 3 => 3, 4 => 3, 5 => 3, 6 => 3, 7 => 3, 8 => 4, 9 => 4, 10 => 4, ), 'n' => 10, ))