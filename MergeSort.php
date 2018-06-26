<?php
/**
 * Created by PhpStorm.
 * User: wq334
 * Date: 2018/6/26
 * Time: 16:19
 */

# 归并排序
/*
 * 原理： 假设初始序列含有n个记录，则可以看成是n个有序的子序列，每个子序列的长度为1，
 * 然后两两归并，得到【n/2】([x]表示不小于x的最小整数)个长度为2或1的有序子序列；再两两
 * 归并，。。。。，如此重复，直只得到一个长度为n的有序序列为止，这种排序方法称为2路
 * 归并排序。
 * */
include_once './helper.php';
error_reporting(0);

function MergeSort(&$arr){
    MSort($arr,$arr,1,count($arr));
    return $arr;
}

function MSort($SR=[],$TR1=[],$s,$t){
    $TR2 = [];
    if($s == $t){
        $TR1[$s] = $SR[$s];
    }else{
        $m = ($s+$t)/2; //将SR[s..t]平分为SR[s..m] 和 SR[m+1..t]
        MSort($SR,$TR2,$s,$m);
        MSort($SR,$TR2,$m+1,$t);
        Merge($TR2,$TR1,$s,$m,$t);
    }
}

function Merge($SR=[],$TR=[],$i,$m,$n){
    for($j=$m+1,$k=$i;$i<=$m && $j<=$n;$k++){
        if($SR[$i]<$SR[$j]){
            $TR[$k] = $SR[$i++];
        }else{
            $TR[$k] = $SR[$j++];
        }
    }
    if($i<=$m){
        for($l=0;$l<=$m-$i;$l++){
            $TR[$k+$l] = $SR[$i+1];
        }
    }
    if($j<=$n){
        for($l=0;$l<=$n-$j;$l++){
            $TR[$k+$l] = $SR[$j+1];
        }
    }
}

//$arr = [1=>65,1,65,89,56,59,86,5,8,3,53,89,5.6,5,98,352,5,98,52,6];
$arr = [65,1,65,89,56,59,86,5,8,3,53,89,5.6,5,98,352,5,98,52,6];
dump($arr);
$arr = MergeSort($arr);
dump($arr);
