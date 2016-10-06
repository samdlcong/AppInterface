<?php
/**
 * 单例模式Db类
 */
class Db {
	static private $_instance;
	static private $_connected;
	private $_dbConfig =array(
		'HOST'=>'localhost',
		'USER'=>'root',
		'PWD'=>'123456',
		'DBNAME'=>'test',
		'CHARSET'=>'utf8'
	);
	final protected function __construct(){
	}

	public static function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self();
		}
		return self::$_instance;
	} 

	public function connect(){
		if(!self::$_connected){
			self::$_connected =mysql_connect($this->_dbConfig['HOST'],$this->_dbConfig['USER'],$this->_dbConfig['PWD']);
			if(!self::$_connected){
				die('mysql connect error'.mysql_error());
			}
			mysql_select_db($this->_dbConfig['DBNAME'],self::$_connected);
			mysql_set_charset($this->_dbConfig['CHARSET'],self::$_connected);
		}
		return self::$_connected;
	}
}

// $connect = Db::getInstance()->connect();
// var_dump($connect);
// $sql = "select * from user";
// $result = mysql_query($sql,$connect);
// var_dump($result);
// if($result){
// 	$arrs = array();
// 	while($row=mysql_fetch_assoc($result)){
// 		$arrs[] = $row;
// 	}
// }
// print_r($arrs);