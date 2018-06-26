<?php
/**
 * Created by PhpStorm.
 * User: wq334
 * Date: 2018/6/26
 * Time: 10:02
 */

# 堆排序
/*
 * headsort  就是利用堆尽心排序的方法。基本思想：将待排序的序列构造成一个大顶堆。
 * 此时，整个序列的最大值就是堆顶的根节点。将它移走（其实就是将其与堆数组的末尾元素交换，此时末尾元素就是最大值），
 * 然后将剩余的n-1 个序列重新构造成一个堆，这样就会得到n个元素中的次小值，如此反复执行，便能得到一个有序序列了。
 * */
/*
 * 堆是具有下列性质的完全二叉树：每个结点的值都大于或等于其左右子节点的值，称为大顶堆；
 * 或者每个节点的值都小于或等于其左右子节点的值，称为小顶堆
 * */
include_once './helper.php';
error_reporting(0);

function HeapSort($arr){
    $num = count($arr);
    for($i=$num/2;$i>0;$i--){
        HeapAdjust($arr,$i,$num);//把数组构建成一个大顶堆
    }
    for($i=$num;$i>1;$i--){
        swap($arr,1,$i);//将堆顶记录和当前未经排序子序列的最后一个记录交换
        HeapAdjust($arr,1,$i-1);
    }
    return $arr;
}

/*
 * 已知$arr[s..m]中记录的关键字除$arr[s]之外均满足堆的定义
 * 本函数调整$arr的关键字，使$arr[] 称为一个大顶堆
 * */
function HeapAdjust (&$arr,$s,$m){
    $temp = $arr[$s];
    for($j=2*$s;$j<=$m;$j*=2){
        if($j<$m && $arr[$j]<$arr[$j+1]){
            ++$j;
        }
        if($temp >= $arr[$j]){
            break;
        }
        $arr[$s] = $arr[$j];
        $s = $j;
    }
    $arr[$s] = $temp;
}

$arr = [50,10,90,30,70,40,80,60,20];
$arr = HeapSort($arr); //仍然少了一次排序
dump($arr);
//假设$arr
//貌似成功
$arr = [1=>50,10,90,30,70,40,80,60,20];
$arr = HeapSort($arr);
dump($arr);
//排序成功，，，为什么会成功。。。
$arr = [1=>65,1,65,89,56,59,86,5,8,3,53,89,5.6,5,98,352,5,98,52,6];
dump($arr);
$arr = HeapSort($arr);
dump($arr);