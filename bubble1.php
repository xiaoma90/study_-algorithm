<?php
/**
 * Created by PhpStorm.
 * User: wq334
 * Date: 2018/6/23
 * Time: 16:25
 */

#冒泡排序
include_once './helper.php';
error_reporting(0);
/**
 * @param $arr
 * @return mixed
 */
function BubbleSort0($arr){
    $num = count($arr);
    foreach($arr as $key => $value){
        $flag = 0;
        foreach($arr as $k=>$v){
            if( $k+1 >= $num){
                break;
            }
            if($arr[$k] > $arr[$k+1]){
                $temp = $arr[$k];
                $arr[$k] = $arr[$k+1];
                $arr[$k+1] = $temp;
                $flag = 1;
            }
        }
        if($flag == 0){
            break;
        }
    }
    return $arr;
}

function BubbleSort1($arr){
    //一共是多少趟
    for($i = count($arr)-1; $i>0; $i--){
        $flag = 0;
        //每一趟进行相邻两个数进行比较
        for($j = 0; $j < $i; $j++){
            if($arr[$j]>$arr[$j+1]){
                $temp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] =$temp;
                $flag = 1;
            }
        }
        if($flag == 0){
            break;
        }
    }
    return $arr;
}
function BubbleSort2($arr){
    $num = count($arr);
    //一共是多少趟
    for($i = 1 ; $i< $num; $i++){
        //从后往前循环
        for($j = $num-2; $j >= $i; $j--){//？$num-1 和 $num-2  的区别
            if($arr[$j]>$arr[$j+1]){
                $temp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] =$temp;
            }
        }
    }
    return $arr;
}
function BubbleSort3($arr){
    $num = count($arr);
    $flag = true;
    //一共是多少趟
    for($i = 1 ; $i< $num && $flag; $i++){
        $flag = false;
        //从后往前循环
        for($j = $num-2; $j >= $i; $j--){//？$num-1 和 $num-2  的区别
            if($arr[$j]>$arr[$j+1]){
//                $temp = $arr[$j];
//                $arr[$j] = $arr[$j+1];
//                $arr[$j+1] =$temp;
                swap($arr,$j,$j+1);
                $flag = true;
            }
        }
    }
    return $arr;
}

$arr = [1,65,65,89,56,59,86,5,8,3,53,89,5.6,5,98,352,5,98,52,6];
$arr = BubbleSort0($arr);
dump(count($arr));
dump($arr);
$arr = [1,65,65,89,56,59,86,5,8,3,53,89,5.6,5,98,352,5,98,52,6];
$arr = BubbleSort1($arr);
dump(count($arr));
dump($arr);
$arr = [1,65,65,89,56,59,86,5,8,3,53,89,5.6,5,98,352,5,98,52,6];
$arr = BubbleSort2($arr);
dump(count($arr));
dump($arr);
$arr = [1,65,65,89,56,59,86,5,8,3,53,89,5.6,5,98,352,5,98,52,6];
$arr = BubbleSort3($arr);
dump(count($arr));
dump($arr);