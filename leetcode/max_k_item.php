<?php
/**
 * 第K大元素
 */

// todo 未完成
function maxK(array $nums,$k){
    $n = count($nums);
    $max_k = quickSort($nums,0,$n-1,$n-$k);
    return $max_k;
}

function quickSort(array &$nums,$l,$r,$k){
    $p = partition($nums,$l,$r);
    if($k == $p+1){
        return $nums[$k];
    }elseif($k > $p+1){
        return quickSort($nums,$p+1,$r,$k);
    }elseif($k < $p+1){
        return quickSort($nums,$l,$p-1,$k);
    }
    return 0;

}

function partition(array &$nums,$l,$r){
    $pivot = $nums[$r];
    $i = $l;

    for($j = $l; $j<$r; $j++){
        if($nums[$j] < $pivot){
            [$nums[$i],$nums[$j]] = [$nums[$j],$nums[$i]];
            ++$i;
        }
    }

    [$nums[$r],$nums[$i]] = [$nums[$i],$nums[$r]];
    return $i;
}

$arr = [3,2,1,5,6,4];
$max_k = maxK($arr,2);
var_dump($max_k);

