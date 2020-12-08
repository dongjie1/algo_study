<?php
/**
 * 找数组中的重复数字
 * 找出数组中重复的数字。


在一个长度为 n 的数组 nums 里的所有数字都在 0～n-1 的范围内。数组中某些数字是重复的，但不知道有几个数字重复了，也不知道每个数字重复了几次。请找出数组中任意一个重复的数字。
限制：
2 <= n <= 100000
 *
 *
来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/shu-zu-zhong-zhong-fu-de-shu-zi-lcof
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class Solution{
    function findRepeatNumber($nums=[]){
        if(empty($nums)){
            return -1;
        }

        for ($i=0; $i<count($nums); $i++){
            while($i != $nums[$i]){//和最下面三行完成排序过程
                if($nums[$i] == $nums[$nums[$i]]){//判断是否重复
                    return $nums[$i];
                }

                //下面三行和while循环其实是排序过程: 2 <= n <= 100000
                $tmp = $nums[$nums[$i]];
                $nums[$nums[$i]] = $nums[$i];
                $nums[$i] = $tmp;
            }
        }

        return -1;
    }
}