<?php
/**
 * 两数之和
 * https://leetcode-cn.com/problems/two-sum/submissions/
 */

class Solution {
    /**
     * @param array $nums
     * @param int $target
     * @return int[]|null
     * 时间复杂度 O(n^2)
     * 空间复杂度 O(1)
     */
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

    /**
     * @param array $nums
     * @param int $target
     * @return array|null
     * 时间复杂度 O(n)
     * 空间复杂度 O(n)
     */
    function twoSum2($nums=array(),$target=0){
        if(empty($nums)) return null;

        $tmp = [];
        for($i=0; $i<count($nums); $i++){
            if(isset($tmp[$target-$nums[$i]])){
                return [$tmp[$nums[$i]], $i];
            }
            $tmp[$nums[$i]] = $i;
        }
    }
}