<?php

// class workerThread extends Thread {
//     public function __construct($i){
//       $this->i=$i;
//     }
    
//     public function run(){
//         $n = 1;
//         while($n <= 10){
//             echo 'thread-'.$this->i.': '.$n . PHP_EOL.PHP_EOL;
//             sleep(1);
//             $n++;
//         }
//     }
// }
// for($i=0;$i<5;$i++){
//     $workers[$i] = new workerThread($i);
//     $workers[$i]->start();
//     echo ''.PHP_EOL;
// }

/**
 * 睡眠排序
 * 遍历数组，开启元素个数对应的线程数
 * 假如数组元素都是整形，分配各线程对等的睡眠时间
 * 当睡眠时间结束后，“优先苏醒”的线程即比较小的元素
 * 完成排序
 * 利用共享内存输出最后结果
 */


class Ares {

    public static $res = array();
}

class workthread extends Thread {
    function __construct($idx, $t, $str)
    {
        $this->t = $t;
        $this->n = $idx;
        $this->shmkey = $str;
    }

    public function run(){
        sleep($this->t);
        $this->over_reflection();
        echo 'index '.($this->n - 1).' element wake up !'.PHP_EOL;
    }

    public function over_reflection(){
        $shm_id = shmop_open($this->shmkey, 'c', 0777, 1000);
        $content = shmop_read($shm_id, 0, shmop_size($shm_id));
        $content = $this->str_from_mem($content);

        if(strlen($content) == 0){
            $content = [$this->t];
        }
        else{
            $content = json_decode(unserialize($content));
            array_push($content, $this->t);
        }
        $this->dowrite($shm_id, $content);

        shmop_close($shm_id);
    }

    function dowrite($id, $data){
        $content = serialize(trim(json_encode($data)));
        $content = $this -> str_to_nts($content);
        shmop_write($id, $content, 0);
    }

    function str_to_nts($value) {
        return "$value\0";
    }
      
    function str_from_mem(&$value) {
        $i = strpos($value, "\0");
        if ($i === false) {
            return $value;
        }
        $result =  substr($value, 0, $i);
        return $result;
    }

}

function ftok($pathname, $proj_id) {
    $st = @stat($pathname);
    if (!$st) {
        return -1;
    }

    $key = sprintf("%u", (($st['ino'] & 0xffff) | (($st['dev'] & 0xff) << 16) | (($proj_id & 0xff) << 24)));
    return $key;
}

function str_from_mem2(&$value) {
    $i = strpos($value, "\0");
    if ($i === false) {
        return $value;
    }
    $result =  substr($value, 0, $i);
    return $result;
}



function dosort($arr) {
    $l = count($arr);

    $shmkey = ftok(__FILE__, '1');

    $threads = [];
    for($i = 1; $i <= $l; $i++){
        $threads[$i-1] = new workthread($i, (int)$arr[$i-1], $shmkey);
        $threads[$i-1] -> start();
    }

    for($i = 1; $i <= $l; $i++){
        $threads[$i-1] -> join();
    }


    if(true){
        $shm_id = shmop_open($shmkey, 'c', 0777, 1000);
        $content = shmop_read($shm_id, 0, shmop_size($shm_id));
        $content = str_from_mem2($content);

        if(!empty($content)){
            $content = json_decode(unserialize($content));
            print_r($content);
        }
    }


}


$arr = array_map(function($v){return $v * mt_rand(1,20);}, array_fill(0,10,1));
print_r($arr);

dosort($arr);

?>