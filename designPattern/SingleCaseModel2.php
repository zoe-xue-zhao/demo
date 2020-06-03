<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2020-01-09 10:23:06
 * @version $Id$
 */

header('Content-Type: text/html; charset=utf-8'); //网页编码
class SingleCaseModel {
	public static $obj;
	private $output = '';

	public function __construct(){
		$this->output();
	}
	public function output(){
		$this->output = '我是单例！';
	}
	public function see(){
		echo $this->output;
	}

	public static function getinstance(){
		if(!(SingleCaseModel::$obj instanceof SingleCaseModel)) {
			SingleCaseModel::$obj = new SingleCaseModel;
		}
		return SingleCaseModel::$obj;
	}
}

$case = SingleCaseModel::getinstance();
$case->see();
