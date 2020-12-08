<?php

/**
 * Class Recursion
 * 递归
 * 爬楼梯问题
 * https://leetcode-cn.com/problems/climbing-stairs/solution/pa-lou-ti-by-leetcode-solution/
 */
class Recursion{
    private $hasStep = array();
    /**
     * @param $n
     * 假如有 n 个台阶，每次可以跨 1 个台阶或者 2 个台阶，请问走这 n 个台阶有多少种走法？
     * 公式: f(n) = f(n-1) + f(n-2)
     */
    public function stepQ($n){
        if($n == 1) return 1;
        if($n == 2) return 2;

        if(isset($this->hasStep[$n])){//避免重复计算
            return $this->hasStep[$n];
        }

        $ret = $this->stepQ($n-1) + $this->stepQ($n - 2);
        $this->hasStep[$n] = $ret;

        return $ret;
    }

    public function stepQ2($n){
        if($n == 1) return 1;
        if($n == 2) return 2;

        $first = 1;
        $second = 2;

        for($i = 3; $i<=$n; $i++){
            $sum = $first + $second;
            $first = $second;
            $second = $sum;
        }

        return $sum;

    }

}

$r = new Recursion();
$res = $r->stepQ2(7);
var_dump($res);