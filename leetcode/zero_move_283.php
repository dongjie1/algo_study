<?php
/**
 * 给定一个数组 nums，编写一个函数将所有 0 移动到数组的末尾，同时保持非零元素的相对顺序。
 * 说明:

必须在原数组上操作，不能拷贝额外的数组。
尽量减少操作次数。
 */

function zeroMove(&$nums=array()){
    $j = 0;//不为0的数组下标
    for($i=0; $i<count($nums); $i++){
        if($nums[$i] != 0){
            $nums[$j] = $nums[$i];
            if($i != $j){
                $nums[$i] = 0;
            }
            $j++;
        }
    }

}