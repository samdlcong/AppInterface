<?php
require_once('./response.php');
require_once('./db.php');
$page = isset($_GET['page'])?$_GET['page']:1;
$pageSize = isset($_GET['pagesize'])?$_GET['pagesize']:1;
if(!is_numeric($page)||!is_numeric($pageSize)){
	return Response::show(401,'数据不合法');
}
$offset=($page-1)*$pageSize;
$sql = "select * from user limit ".$offset.', '.$pageSize;
$connect = Db::getInstance()->connect();
$result = mysql_query($sql,$connect);
if($result){
	$rows = array();
	while($row = mysql_fetch_assoc($result)){
		$rows[] = $row;
	}
	return Ressponse::show(200,'数据取出成功',$rows);
}