<?php

require_once('./response.php');
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

Response::show(200,'数据返回成功',$arr);