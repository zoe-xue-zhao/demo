<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2019-12-28 10:44:09
 * @version $Id$
 */

/**
 * 工厂demo
 * 江南皮革厂
 */

class JiangnanLeatherFactory {

    public static $name;

    public function __construct() {
        self::$name = '江南皮革厂';
    }

    /**
     * 实例化
     * 根据不同的生产线返回对象
     */
    public static function factoryBeltline($beltline){
        $classname = 'leather'.ucfirst($beltline);
        if( class_exists($classname) ){
            return new $classname ();
        }else{
            die('error: class ‘'.$classname.'’ undefined');
        }
    }

}


/**
 * 抽象类：皮革产品属性
 */
abstract class leatherAttribute{
    public $leatherType;
    public $leatherDesc;
    public $rate;

    function setData($type){
        $this->leatherType = $type;
        switch($type){
            case '1':
                $this->leatherDesc = '真皮';
                $this->rate = 3;
                break;
            case '2':
                $this->rate = 1.8;
                $this->leatherDesc = '人造革';
                break;
        }
    }

    abstract function setSalePrice();
}

/**
 * 接口
 */
interface sloganEcho{
    public function myslogan();
}

/**
 * 生产线：皮鞋
 */
class leatherShoes extends leatherAttribute {
    private $costprice = 100;
    public $saleprice;

    function setSalePrice(){
        $this->saleprice = $this->costprice * $this->rate;
        echo $this->leatherDesc . '皮鞋售价：￥' . $this->saleprice;
    }
}

/**
 * 生产线：皮包
 */
class leatherBag extends leatherAttribute implements sloganEcho {
    private $costprice = 80;
    public $saleprice;

    function setSalePrice(){
        $this->saleprice = $this->costprice * $this->rate;
        echo $this->leatherDesc . '皮包售价：￥' . $this->saleprice;
    }

    function myslogan(){
        $content = "江南最大的皮革厂倒闭啦~，老板吃喝嫖赌欠下3.5个亿，带着他的小姨子跑啦~<br><br>所有皮包，真皮包包亏本处理，亏本处理！<br><br>一律20块，统统20块！！！";
        return $content;
    }
}

/**
 * 生产线：皮带
 */
class leatherBelt extends leatherAttribute{
    private $costprice = 50;
    public $saleprice;

    function setSalePrice(){
        $this->saleprice = $this->costprice * $this->rate;
        echo $this->leatherDesc . '皮带售价：￥' . $this->saleprice;
    }
}


$factory = new JiangnanLeatherFactory();
echo $factory::$name;
echo '<br><br>';

//错误实例化
//echo $factory::factoryBeltline('test');
//echo '<br><br>';

$obj_shoes = $factory::factoryBeltline('shoes');
$obj_shoes->setData(1);
$obj_shoes->setSalePrice();
echo '<br><br>';

$obj_belt = $factory::factoryBeltline('belt');
$obj_belt->setData(2);
$obj_belt->setSalePrice();
echo '<br><br>';

$obj_bag = $factory::factoryBeltline('bag');
echo $obj_bag->myslogan();