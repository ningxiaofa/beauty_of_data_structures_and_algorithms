
<?php

require_once(dirname(dirname(__DIR__)) . '/顺序栈/ArrayStack.php');

// 场景: 
// 如何实现浏览器的前进、后退功能？

// 思路:
// 其实，用两个栈就可以非常完美地解决这个问题。
// 我们使用两个栈，X 和 Y，我们把首次浏览的页面依次压入栈 X，当点击后退按钮时，再依次从栈 X 中出栈，并将出栈的数据依次放入栈 Y。
// 当我们点击前进按钮时，我们依次从栈 Y 中取出数据，放入栈 X 中。
// 当栈 X 中没有数据时，那就说明没有页面可以继续后退浏览了。
// 当栈 Y 中没有数据，那就说明没有页面可以点击前进按钮浏览了。 

class ForwardAndBackwardBrowsers
{
    private $stack;
    private $anotherStack;

    public function __construct()
    {
        $this->stack = new ArrayStack();
        $this->anotherStack = new ArrayStack();
    }

    public function forward($item, $newLink = true)
    {
        if ($newLink) {
            $this->stack->push($item);
            if (!$this->anotherStack->isEmpty()) $this->anotherStack->clear();
        } else {
            $forwardItem = $this->anotherStack->pop();
            if($forwardItem){
                $this->stack->push($forwardItem);
            }else{
                throw new Exception('无法再前进页面可用');
            }
        }

        // 可以帮助知道: 两个栈的元素变化
        // var_export($this->stack);
        // print "<hr/>";
        // var_export($this->anotherStack);
        // print "<hr/>";

        return $this->stack->peek();
    }

    public function back()
    {
        $item = $this->stack->pop();
        if (!$item) throw new Exception('不能再后退');
        $this->anotherStack->push($item);
        // 返回的要一直是栈顶元素, 但是不能出栈
        return $this->stack->peek();
    }
}
