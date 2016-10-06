<?php

require_once('./response.php');
require_once('./file.php');
$arr =array(
	'id' =>1,
	'name'=>'ssss',
	'1'=>'3333',
	'3'=>'ssexdf',
	'itrm'=>array(
		'ie'=>22,
		'4'=>'sss'
	)
);

//Response::show(200,'数据返回成功',$arr);
$file = new File();
// if($file->cacheData('index_test_cache',$arr)){
// 	echo 'success';
// }else{
// 	echo 'error';
// }

if($file->cacheData('index_test_cache',null)){
	//var_dump($file->cacheData('index_test_cache'));exit;
	echo 'success';
}else{
	echo 'error';
}
