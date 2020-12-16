<?php
/**
 * 快速排序
 * 把数组分为已处理部分(一般从0开始)和未处理部分(一般从结尾开始),以pivot(一般是末尾元素)，比pivot小的放到已处理部分末尾
 *
 * 如果要排序数组中下标从 p 到 r 之间的一组数据，我们选择 p 到 r 之间的任意一个数据作为 pivot（分区点）。
 * 我们遍历 p 到 r 之间的数据，将小于 pivot 的放到左边，将大于 pivot 的放到右边，将 pivot 放到中间。
 * 经过这一步骤之后，数组 p 到 r 之间的数据就被分成了三个部分，
 * 前面 p 到 q-1 之间都是小于 pivot 的，中间是 pivot，后面的 q+1 到 r 之间是大于 pivot 的
 * 递归
 */


function quickSort(array &$arr){
    $n = count($arr);
    quickSortInternally($arr,0,$n-1);
}

function quickSortInternally(array &$arr,$l,$r){
    if($l >= $r) return;

    $p = partition($arr,$l,$r);
    quickSortInternally($arr,$l,$p-1);
    quickSortInternally($arr,$p+1,$r);
}

function partition(array &$arr,$l,$r){
    $pivot = $arr[$r];

    $i = $l;

    for($j=$l; $j<$r; $j++){
        if($arr[$j] < $pivot){
            $tmp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $tmp;
//            [$arr[$i],$arr[$j]] = [$arr[$j],$arr[$i]];//也可以用这个
            ++$i;
        }
    }
    [$arr[$r],$arr[$i]] = [$arr[$i],$arr[$r]];//php7.1支持的语法
    return $i;
}

$a1 = [1,4,6,2,3,5,4];
$a2 = [2, 2, 2, 2];
$a3 = [4, 3, 2, 1];
$a4 = [5, -1, 9, 3, 7, 8, 3, -2, 9];
quickSort($a1);
print_r($a1);
quickSort($a2);
print_r($a2);
quickSort($a3);
print_r($a3);
quickSort($a4);
print_r($a4);