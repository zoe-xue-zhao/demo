<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2019-12-27 18:45:39
 * @version $Id$
 */
// //自定义错误等级
// trigger_error('1111111', E_USER_ERROR);
// trigger_error('1111111', E_USER_NOTICE);

class SingleTest{

    private static $objSingle;
    private $output = '';

    public function __construct(){
        $this->SingleTest();
    }

    public function SingleTest(){
        $this->output = 'Hello ^_^!';
    }

    public static function getInstance(){
        if( !(self::$objSingle instanceof self) ){ // instanceof（1）判断一个对象是否是某个类的实例，（2）判断一个对象是否实现了某个接口。
            self::$objSingle = new self;
        }
        return self::$objSingle;
    }

    // public function __clone(){
    //     trigger_error('Not allow!', E_USER_ERROR);
    // }

    public function output(){
        echo $this->output;
    }

}

$objSingle = SingleTest::getInstance();
$objSingle->output();

// $objclone = clone($objSingle);

// ?>