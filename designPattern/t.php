<?php
// error_reporting(0);

/**
 * 
 * 排序算法--猴子
 * 无规律数组
 * 不确定的排序计数
 * 一轮父循环中，判断数组是否具有顺序性 boolean
 *     判断是否顺序性是遍历数组，如果发现存在当前元素与前一位元素的大小不符合规则，返回true
 *     否者返回false
 * 如果无序进行下一轮循环
 * 如果有序终止循环
 * 循环体：遍历数组，并将当前数组元素与随机下标的元素进行交换
 */

function mainsub($arr) {
    if( !empty($arr) ) {
        $allnum = 0;
        $now_s = time();
        while(!IsSort($arr)){
            $allnum += 1;
            $arr = DoSort($arr);
        }
        $now_e = time();
    }
    if($allnum > 0){
        print_r($arr);
        echo ''.PHP_EOL;
        echo 'sort num : '.$allnum.PHP_EOL;
        echo 'exec time : '.($now_e - $now_s);
    }
}


function DoSort($arr){
    $l = count($arr);
    for($i = 0; $i < $l; $i++){
        $r = mt_rand(0, ($l-1));
        $tmp = $arr[$i];
        $arr[$i] = $arr[$r];
        $arr[$r] = $tmp;
        unset($tmp);
    }
    return $arr;
}

//判断是否具有顺序性
function IsSort($arr){
    $l = count($arr);
    $return = true;
    for($i = 1; $i <= $l - 1; $i++){
        $bool = ($arr[$i] < $arr [$i - 1]);
        if( $bool ) {
            $return = false;
            break;
        }
    }
    return $return;
}


$arr = array_map(function($v){return $v * mt_rand(1,20);}, array_fill(0,10,1));
print_r($arr);

mainsub($arr);


?>