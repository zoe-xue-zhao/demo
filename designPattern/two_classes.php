<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2020-05-19 10:06:38
 * @version $Id$
 */

class Class1{
	private $age;
    function __construct(){
    }
    function __invoke(){
    	echo 'tttt';
    }
    function __set($k,$v) {
    	$this->$k = $v;
    }
    function __get($k) {
    	return $this->$k;
    }
    function __call($method,$arguments) {
    	$str = $method.' no exist'.print_r($arguments);
    	return $str;
    }
}

class Class2{
	public $a;
 	function __construct(Class1 $class1){
 		$a = $class1;
    	echo $a();	//把对象当函数用；
    }   
}

$class1 = new Class1();
echo $class1->yesy('test','dsf');


// $class1->age = 1;
// var_dump($class1->age);
// $class2 = new Class2(new Class1);
// var_dump($class2);
