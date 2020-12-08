<?php
/**
 * 两数之和
 * https://leetcode-cn.com/problems/two-sum/submissions/
 */

class Solution {
    function twoSum($nums=array(),$target=0){
        if(empty($nums)) return null;

        $len = count($nums);
        for($i=0; $i<$len; $i++){
            for($j=$i+1; $j<=$len; $j++){
                if($nums[$i] + $nums[$j] == $target){
                    return [$i,$j];
                }
            }
        }
        return null;
    }
}