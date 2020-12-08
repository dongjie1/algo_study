<?php
namespace algo_php;
include_once './array.php';

$arr = new MyArray(20);
for($i = 0; $i<10; $i++){
    $arr->insert($i,$i);
}
$arr->printData();

$arr->insert(3,31);
$arr->insert(5,51);
$arr->insert(9,91);
$arr->insert(13,13);

$arr->printData();

$arr->delete(3);
$arr->printData();

$arr->delete(10);
$arr->printData();