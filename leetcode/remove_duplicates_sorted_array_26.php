<?php

/**
 * Class Solution
 * 给定一个排序数组，你需要在 原地 删除重复出现的元素，使得每个元素只出现一次，返回移除后数组的新长度。

不要使用额外的数组空间，你必须在 原地 修改输入数组 并在使用 O(1) 额外空间的条件下完成。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/remove-duplicates-from-sorted-array
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $last = $nums[0];
        $res = 1;

        $len = count($nums);
        for ($i=1; $i<$len; $i++){
            if($nums[$i] == $last){
                unset($nums[$i]);
                continue;
            }
            $last = $nums[$i];
            $res++;
        }

        return $res;
    }
}