<?php
/**
 * 二分查找
 * 注意
 * 1.退出条件  $low<=$high
 * 2.mid的取值:优化$low + (($high-$low)>>1)
 * 3.low和$high的更新 low=mid+1/ high=mid-1
 * @param array $arrr
 * @param int $value
 * @return int
 */

//已排序，无重复
function bsearch($arrr=[],$value=0){
    if(empty($arrr)) return -1;

    $low = 0; $high = count($arrr)-1;

    while($low <= $high){
        $mid = $low + (($high-$low)>>1);//$mid=($low+$high)/2;如果$low和$height很大($low+$high)可能会溢出
        if($arrr[$mid] == $value){
            return $mid;
        }elseif($arrr[$mid] < $value){
            $low = $mid + 1;
        }elseif($arrr[$mid] > $value){
            $high = $mid - 1;
        }
    }

    return -1;
}

//已排序，有重复，查找第一个等于value的值
function bsearchFirst($arr,$value){
    if(empty($arr)) return -1;

    $low = 0; $high=count($arr)-1;
    while ($low <= $high){
        $mid = ($low + ($high - $low) >> 1);
        if($arr[$mid] > $value){
            $high = $mid - 1;
        }elseif($arr[$mid] < $value){
            $low = $mid + 1;
        }else{
            if(($mid == 0) || $arr[$mid-1] != $value){//如果$mid=0就是第一个元素了，否则如果$arr[$mid]的前一个元素$arr[$mid-1]不等于$value则是出现的第一个$value了
                return $mid;
            }else{//如果$arr[$mid]的前一个元素$arr[$mid-1]还是等于$value则继续查找
                $high = $mid - 1;
            }
        }
    }
    return -1;
}

//已排序，有重复，查找最后出现的那个
function bsearchLast($arr,$value){
    if(empty($arr)) return -1;

    $len = count($arr)-1;
    $low = 0 ;$high = $len;
    while ($low <= $high){
        $mid = $low + (($high - $low) >> 1);
        if($arr[$mid] > $value){
            $high = $mid - 1;
        }elseif($arr[$mid] < $value){
            $low = $mid + 1;
        }else{//主要是下面几行代码
            if(($mid == $len) || $arr[$mid+1] != $value){
                return $mid;
            }else{
                $low = $mid + 1;
            }
        }
    }
    return -1;
}

//已排序，有重复，查找第一个大于value的元素，且value不在数组中
function bsearchFirstGt($arr,$value){
    if(empty($arr)) return -1;
    $len = count($arr)-1;

    $low = 1; $high = $len;

    while ($low <= $high){
        $mid = $low + (($high - $low) >> 1);
        if($arr[$mid] >= $value){
            if(($mid == 0) || ($arr[$mid - 1] < $value)){
                return $mid;
            } else{
                $high = $mid -1;
            }
        }elseif($arr[$mid] < $value){
            $low = $mid + 1;
        }

    }
    return -1;
}

//已排序，查找最后一个小于等于value的元素,且value不在$arr中
function bsearchLastLt($arr,$value){
    if(empty($arr)) return -1;
    $len = count($arr) - 1;

    $low = 0; $high = $len;
    while($low <= $high){
        $mid = $low + (($high - $low) >> 1);
        if($arr[$mid] < $value){
            $low = $mid + 1;
        }elseif($arr[$mid] >= $value){
            if(($mid == $len) || ($arr[$mid - 1] < $value)) return $mid-1;
            else $high = $high - 1;
        }
    }
    return -1;
}

$arr = [1,3,4,6,12,16,19,23,45,46,58,59,66,88,100,454,566,2232];
$n = 46;
$index = bsearch($arr,$n);
var_dump($index);

$arr2 = [1,3,5,6,8,8,8,9,9,10];
$n = 8;
$first = bsearchFirst($arr2,$n);
var_dump($first);//4
$last = bsearchLast($arr2,$n);
var_dump($last);

$arr3 = [2,3,5,7,9,10,13,15];
$first_gt = bsearchFirstGt($arr3,11);
var_dump($first_gt);//4

$arr4 = [3,5,6,8,9,10];
$last_lt = bsearchLastLt($arr3,9);
var_dump($last_lt);