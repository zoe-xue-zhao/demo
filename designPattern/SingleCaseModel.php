<?php
/**
 * 单例模式 （只实例化一次，优点：减少实例化的开销）
 * @authors zoe
 * @date    2019-12-28 10:15:12
 * @version $Id$
 */
header('Content-Type: text/html; charset=utf-8'); //网页编码

class SingleCaseModel {
	public static $obj;
	public $output = '';

	public function __construct(){
		$this->SingleCaseModel();
	}

	public function SingleCaseModel(){
		$this->output = '我是单例！';
	}

	public static function get_single() {
		if( !(SingleCaseModel::$obj instanceof SingleCaseModel)) {
			SingleCaseModel::$obj = new SingleCaseModel;
		} 
		return SingleCaseModel::$obj;
	}

	public function output(){
		echo $this->output;
	}

}

$model = SingleCaseModel::get_single();
$model->output();

