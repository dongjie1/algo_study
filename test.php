<?php

function removeDuplicates(&$nums) {
    $last = $nums[0];
    $len = count($nums);
    for ($i=1; $i<$len; $i++){
        if($nums[$i] == $last){
            unset($nums[$i]);
            continue;
        }
        $last = $nums[$i];
    }

    return count($nums);
}

$nums = [0,0,1,1,2,3,3,4];
$n = removeDuplicates($nums);
print_r($nums);