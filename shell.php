<?php
/**
 * Created by PhpStorm.
 * User: wq334
 * Date: 2018/6/23
 * Time: 18:41
 */

#希尔排序
include_once './helper.php';
error_reporting(0);

function ShellSort0($arr){

    $num = $increment = count($arr);
    do{
        $increment = $increment/3;
        for($i=$increment+1;$i<=$num;$i++){
            if($arr[$i] < $arr[$i-$increment]){
                $arr[0] = $arr[$i];
                for($j=$i-$increment;$j>0 && $arr[0]<$arr[$j];$j-=$increment){
                    $arr[$j+$increment] = $arr[$j];
                }
                $arr[$j+$increment] = $arr[0];
            }
        }
    }while($increment >1);
    return $arr;
}
dump(100.999999 % 50);//??????  求模 忽略了小数点 结果有问题
#少了一次排序，最后结果错误，基本有序
$arr = [65,1,65,89,56,59,86,5,8,3,53,89,5.6,5,98,352,5,98,52,6];
$arr = ShellSort0($arr);
dump(count($arr));
dump($arr);