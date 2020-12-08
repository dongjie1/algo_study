<?php
function isUnique($astr) {
    if(empty($astr)){
        return false;
    }
    $arr = str_split($astr);
    $len = count($arr);
    for($i=0; $i<$len;$i++){
        for($j=$i+1;$j<$len;$j++){
            if($arr[$i] == $arr[$j]){
                return false;
            }
        }
    }

    return true;
}

function isUnique2($astr){
    if (empty($astr)){
        return false;
    }

    $low64 = 0;
    $height64 = 0;

    $arr = str_split($astr);
    foreach($arr as $v){
        $vn = ord($v);
        if($vn >= 64){
            $bit_index = 1 << ($vn - 64);
            if($height64 & $bit_index){
               return false;
            }

            $height64 |= $bit_index;
        }else{
            $bit_index = 1<<$vn;
            if($low64 & $bit_index){
                return false;
            }
            $low64 |= $bit_index;
        }
    }
    return true;
}

//echo 'PHP_INT_SIZE ==> '.PHP_INT_SIZE; //8
//echo "\n PHP_INT_MAX ==>" . PHP_INT_MAX;
//die();

$str = 'abccAABB#111#1';
var_dump(isUnique2($str));