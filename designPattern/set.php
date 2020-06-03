<?php

class Person

{

    private $name;

    private $age;

    public function __construct($name="",  $age=25)

    {

        $this->name = $name;

        $this->age  = $age;

    }

    /**

     * 声明魔术方法需要两个参数，真接为私有属性赋值时自动调用，并可以屏蔽一些非法赋值

     * @param $property

     * @param $value

     */

    public function __set($property, $value) {

        if ($property=="age")

        {

            if ($value > 150 || $value < 0) {

                return;

            }

        }

        $this->$property = $value;

    }

    /**

     * 在类中声明说话的方法，将所有的私有属性说出

     */

    public function say(){

        echo "我叫".$this->name."，今年".$this->age."岁了";

    }

}

$Person=new Person("小明", 25); //注意，初始值将被下面所改变

//自动调用了__set()函数，将属性名name传给第一个参数，将属性值”李四”传给第二个参数

$Person->name = "小红";     //赋值成功。如果没有__set()，则出错。

//自动调用了__set()函数，将属性名age传给第一个参数，将属性值26传给第二个参数

$Person->age = 16; //赋值成功

$Person->age = 160; //160是一个非法值，赋值失效

// $Person->say();  //输出：我叫小红，今年16岁了
var_dump($Person->age);