<?php
/**
 * Created by PhpStorm.
 * User: wq334
 * Date: 2018/6/23
 * Time: 17:42
 */

#选择排序
include_once './helper.php';
error_reporting(0);
function SelectSort0($arr)
{
    $num = count($arr);
    for($i=0;$i<$num;$i++){
        $min = $i;
        for($j=$i+1;$j<$num;$j++){
            if($arr[$min] > $arr[$j]){
                $min = $j;
            }
        }
        if($i != $min){
            swap($arr,$i,$min);
        }
    }
    return $arr;
}
$arr = [65,1,65,89,56,59,86,5,8,3,53,89,5.6,5,98,352,5,98,52,6];
$arr = SelectSort0($arr);
dump(count($arr));
dump($arr);