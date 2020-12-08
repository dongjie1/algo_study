<?php

/**
 * 栈:计算器
 * Class Compute
 */
class Compute {
    private $numStack;
    private $operStack;

    public function __construct(){
        $this->numStack = [];
        $this->operStack = [];
        $this->operStack[] = null;
    }

    /**
     * @param string $exp 计算表达式
     */
    public function computeExp($exp=''){
        $exp = str_replace(' ','',$exp);
        $arr = preg_split('/([\+\-\*\/\(\)])/', $exp, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        var_dump($arr);

        $arrLen = count($arr);
        for($i=0; $i<$arrLen; $i++){
//            if(ord($arr[$i]) >= 48 && ord($arr[$i])<=57){
//                array_push($this->numStack,$arr[$i]);
//                continue;
//            }
            if(is_numeric($arr[$i])){
                array_push($this->numStack,$arr[$i]);
                continue;
            }

            var_dump($this->numStack,$this->operStack);

            switch ($arr[$i]){
                case '+':
                case '-':
                    $len = count($this->operStack);
                    while($this->operStack[$len-1] === '*' || $this->operStack[$len-1] === '/' || $this->operStack[$len-1] === '-'){
                        $this->compute();
                        $len--;
                    }
                    array_push($this->operStack,$arr[$i]);
                    break;
                case '*':
                    $len = count($this->operStack);
                    while ($this->operStack[$len-1] === '/'){
                        $this->compute();
                        $len--;
                    }
                    array_push($this->operStack,$arr[$i]);
                    break;
                case '/':
                case '(':
                    array_push($this->operStack,$arr[$i]);
                    break;
                case ')':
                    $len = count($this->operStack);
                    while ($this->operStack[$len-1] !== '('){
                        $this->compute();
                        $len--;
                    }
                    array_pop($this->operStack);
                    break;
                default:
                    throw new Exception('不支持的运算符');
            }

        }
        $len = count($this->operStack);
        while ($this->operStack[$len-1] !== null){
            $this->compute();
            $len--;
        }

        $res = array_pop($this->numStack);
        return $res;
    }

    private function compute(){
        $num = array_pop($this->numStack);
        $opt = array_pop($this->operStack);
        switch ($opt){
            case '+':
                array_push($this->numStack,array_pop($this->numStack)+$num);
                break;
            case '-':
                array_push($this->numStack,array_pop($this->numStack)-$num);
                break;
            case '*':
                array_push($this->numStack,array_pop($this->numStack)*$num);
                break;
            case '/':
                array_push($this->numStack,array_pop($this->numStack)/$num);
                break;
            case '(':
                throw new Exception('不支持的运算符');
        }
    }
}

$pc = new Compute();
$res = $pc->computeExp('1 + 2 + ( 800 - 3 * 2 )+4+5*2+6/3');
var_dump($res);

//$n = '0a';
//echo ord($n)."\n";
