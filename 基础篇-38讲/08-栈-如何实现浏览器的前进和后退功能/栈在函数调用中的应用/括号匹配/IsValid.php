<?php

require_once(dirname(dirname(__DIR__)) . '/顺序栈/ArrayStack.php');

class IsValid
{
    private $stack;

    public function __construct()
    {
        $this->stack = new ArrayStack();
    }

    /**
     * 方式一: 递归 抵消
     * @param String $s
     * @return Boolean
     */
    function check($s)
    {
        $validArr = ["()", "[]", "{}"];
        $count = count($validArr);

        while ($s) {
            $validSign =  false;
            for ($i = 0; $i < $count; $i++) {
                if (strpos($s, $validArr[$i]) !== false) {
                    $validSign = true;
                    $s = str_replace($validArr[$i], "", $s);
                }
            }

            if (!$validSign) {
                return false;
            }
        }

        return true;
    }

    // 方式二: 借助栈实现
    public function isValidByStack($string)
    {
        $length = strlen($string);
        if (!$length) return false;

        $map = [
            ")" => "(",
            "}" => "{",
            "]" => "[",
        ];

        for ($i = 0; $i < $length; $i++) {
            $char = $string[$i];
            // 如果是左括号, 直接入栈
            if (in_array($char, array_values($map))) {
                $this->stack->push($char);
            } else {
                // 如果是右括号, 则出栈顶元素, 与之匹配, 不能匹之, 必是无效, 能匹之, 继续遍历
                $item = $this->stack->pop();
                if ($item !== $map[$char]) return false;
            }
        }

        // 如果栈中还有数据, 说明是无效
        if($this->stack->pop()){
            return false;
        }

        return true;
    }
}
