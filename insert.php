<?php
/**
 * Created by PhpStorm.
 * User: wq334
 * Date: 2018/6/23
 * Time: 18:10
 */

#插入排序
include_once './helper.php';
error_reporting(0);

function InsertSort($arr){
    $num = count($arr);
    for($i=1;$i<$num;$i++){
        if($arr[$i] < $arr[$i-1]){
            $arr[0] = $arr[$i];//设置哨兵
            for($j=$i-1;$arr[$j]>$arr[0];$j--){ // ? 没成功，少了一次排序，那里少的？
                $arr[$j+1] = $arr[$j];//记录后移
            }
            $arr[$j+1] = $arr[0];  //插入到正确位置
        }
    }
    return $arr;
}
$arr = [65,1,65,89,56,59,86,5,8,3,53,89,5.6,5,98,352,5,98,52,6];
dump($arr);
$arr = InsertSort($arr);
dump($arr);
//假设失败
$arr = [1=>65,2=>1,3=>65,4=>89,5=>59,6=>5,7=>53,8=>6,9=>20];
$arr = InsertSort($arr);
dump($arr);
//待续
