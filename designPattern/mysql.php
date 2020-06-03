<?php
/**
 * 单例数据库连接
 * @authors zoe (you@example.org)
 * @date    2020-01-11 17:51:03
 * @version 1.0
 */
header('Content-Type:text/html;charset=utf-8');

class Mysql{
	const DBHOST = 'localhost';
	const DBUSER = 'root';
	const DBPWD = '';
	const DBNAME = 'practice';
	const DBPORT = '3306';

	public $link;
	public static $obj;

	public function __construct(){
		$this->connect();
	}

	/**
	 * [__clone description]
	 * @return [type] [description]
	 */
	private function __clone()
    { }

    /**
     * [getinstace 单例模式]
     * @return [type] [description]
     */
    public static function getInstace(){
    	if(!(Mysql::$obj instanceof Mysql)) { // instanceof（1）判断一个对象是否是某个类的实例，（2）判断一个对象是否实现了某个接口。
    		Mysql::$obj = new Mysql;
    	} 
    	return Mysql::$obj;
    }

	public function connect(){
		$this->link = @mysqli_connect(self::DBHOST,self::DBUSER,self::DBPWD,self::DBNAME,self::DBPORT);
		if (!$this->link) {
			return '连接错误：'.mysqli_connect_error();
		} else {
			mysqli_query($this->link,'set names utf8');
		}
		if(self::DBNAME) {
			if(mysqli_select_db($this->link,self::DBNAME) === false) {
				return '不能选择mysql中的'.self::DBNAME;
			}
		}
	}

	public function query($sql) {
		return mysqli_query($this->link,$sql);
	}

	public function select_db($dbname) {
		return mysqli_select_db($this->link,$dbname);
	}

	public function mysqli_close(){
		return mysqli_close($this->link);
	}

	public function fetch_array($result,$type=MYSQLI_ASSOC){
		return mysqli_fetch_array($result,$type);
	}

	public function close(){
		return mysqli_close($this->link);
	}

	public function getone($sql){
		$query = $this->query($sql);
		$row = $this->fetch_array($query) ;
		return $row;
	}

	public function getall($sql){
		$query = $this->query($sql);
		while ($row = $this->fetch_array($query)) {
			$rows[] = $row;
		}
		return $rows;
	}
}

$db = Mysql::getInstace();
$link = $db->connect();
$sql = 'select * from goods';
// $goods = $db->query($sql);
// while ($row =$db->fetch_array($goods)) {
// 	$rows[]=$row;
// }
// var_dump($rows);
$one = $db->getone($sql);
var_dump($one);
$all = $db->getall($sql);
var_dump($all);
$db->mysqli_close();


