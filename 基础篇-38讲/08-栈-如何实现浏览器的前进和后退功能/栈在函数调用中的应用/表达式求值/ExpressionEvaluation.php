<?php

// 场景:
// 我们再来看栈的另一个常见的应用场景，编译器如何利用栈来实现表达式求值。

// 思考[简化]过程:
// 为了方便解释，我将算术表达式简化为只包含加减乘除四则运算，比如：34+13*9+44-12/3。对于这个四则运算，我们人脑可以很快求解出答案，但是对于计算机来说，理解这个表达式本身就是个挺难的事儿。如果换作你，让你来实现这样一个表达式求值的功能，你会怎么做呢？

// 解决方案: 
// 实际上，编译器就是通过两个栈来实现的。其中一个保存操作数的栈，另一个是保存运算符的栈。
// 我们从左向右遍历表达式，当遇到数字，我们就直接压入操作数栈；当遇到运算符，就与运算符栈的栈顶元素进行比较。
// 如果比运算符栈顶元素的优先级高，就将当前运算符压入栈；如果比运算符栈顶元素的优先级低或者相同，从运算符栈中取栈顶运算符，从操作数栈的栈顶取 2 个操作数，然后进行计算，再把计算完的结果压入操作数栈，继续比较。

// 验证:
// 我将 3+5*8-6 这个表达式的计算过程画成了一张图，你可以结合图来理解我刚讲的计算过程。


// 代码实现: 这里可以使用数组栈,或者链式栈 --- 先使用数组栈
require_once(dirname(dirname(__DIR__)) . '/顺序栈/ArrayStack.php');

class ExpressionEvaluation
{
    private $operateStack;
    private $numberStack;
    // 操作符集合, 暂时不支持括号等 --- 涉及到编译原理
    private $operateSet = [
        '+' => 1, '-' => 1, '*' => 2, '/' => 2  // 数字表示优先级, 越大优先级越高
    ];

    public function __construct()
    {
        $this->operateStack = new ArrayStack();
        $this->numberStack = new ArrayStack();
    }

    public function elvaluate($expression)
    {
        $length = strlen($expression);
        if (!$length) throw new Exception('请输入表达式');

        $numberTmp = '';
        for ($i = 0; $i < $length; $i++) {
            // 处理空格
            $char = $expression[$i];
            if (!$char) continue;
            // 匹配操作符
            if (in_array($char, array_keys($this->operateSet))) {
                if (!$numberTmp) throw new Exception('表达式不合理');
                // 当遇到操作符，将之前的操作数压入操作数栈
                $this->numberStack->push($numberTmp);
                $numberTmp = ''; // 重置临时变量

                // 当遇到运算符，与运算符栈的栈顶元素进行比较
                $this->operateStackCompare($char);
                continue;
            }

            // 匹配操作数
            if (is_numeric($char)) {
                // 要考虑多个数字字符
                $numberTmp .= $char;
            }
        }

        // 将最后一个操作数, 入栈
        $this->numberStack->push($numberTmp);

        // 计算最后一步
        return $this->iterateEvaluate();
    }

    private function operateStackCompare($char)
    {
        // 如果比运算符栈顶元素的优先级高，就将当前运算符压入栈；
        // 如果比运算符栈顶元素的优先级低或者相同，从运算符栈中取栈顶运算符，从操作数栈的栈顶取 2 个操作数，
        // 然后进行计算，再把计算完的结果压入操作数栈，继续比较。
        if ($this->operateStack->isEmpty()) {
            $this->operateStack->push($char);
            return;
        }
        
        $operation = $this->operateStack->pop();
        if ($this->operateSet[$char] > $this->operateSet[$operation]) {
            // 取出, 还要放回去 -- 踩了坑
            $this->operateStack->push($operation);
            $this->operateStack->push($char);
        } else {
            $number1 =  $this->numberStack->pop();
            $number2 =  $this->numberStack->pop();
            $ret = $this->replaceOperate($number1, $operation, $number2);
            $this->numberStack->push($ret);

            //继续比较
            $this->operateStackCompare($char);
        }
    }

    // 注意操作数的前后顺序
    private function replaceOperate($number1, $operation, $number2)
    {
        $ret = null;

        switch ($operation) {
            case '+';
                $ret = $number1 + $number2;
                break;
            case '-';
                $ret = $number2 - $number1;
                break;
            case '*';
                $ret = $number1 * $number2;
                break;
            case '/';
                $ret = $number2 / $number1;
                break;
            default:
                break;
        }

        return $ret;
    }

    private function iterateEvaluate()
    {
        do {
            $number1 = $this->numberStack->pop();
            $number2 = $this->numberStack->pop();
            $operation = $this->operateStack->pop();
            $ret = $this->replaceOperate($number1, $operation, $number2);
            $this->numberStack->push($ret);
        } while (!$this->operateStack->isEmpty());

        return $this->numberStack->pop();
    }
}
