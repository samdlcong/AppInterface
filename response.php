<?php

class Response{
	const JSON ="json";
	/**
	 * 按综合方式输出通讯方法
	 * @param  integer $code   状态码
	 * @param  string $message 提示信息
	 * @param  array  $data    数据
	 * @param  string $type    数据类型
	 * @return string          [description]
	 */
	public static function show($code,$message='',$data=array(),$type=self::JSON){
		if(!is_numeric($code)){
			return '';
		}

		$result = array(
			'code'=>$code,
			'message'=>$message,
			'data'=>$data
		);

		$type = isset($_GET['format'])?$_GET['format']:$type;
		if($type=='json'){
			self::json($code,$message,$data);
			exit;
		}elseif($type=='array'){
			var_dump($result);
		}elseif($type=='xml'){
			self::xml($code,$message,$data);
		}else{
			//TODO
		}

	}


	/**
	 * 按json方式输出通信数据
	 * @param  integer $code   状态码
	 * @param  string $message  提示信息
	 * @param  array  $data    数据
	 * @return string         [description]
	 */
	public static function json($code,$message='',$data=array()){
		if(!is_numeric($code)){
			return '';
		}

		$result = array(
			'code'=>$code,
			'message'=>$message,
			'data'=>$data
		);
		//echo json_encode($result);exit;
		exit(json_encode($result));
	}
	/**
	 * 按xml方式输出通信数据
	 * @param  integer $code    状态码
	 * @param  string $message  提示信息
	 * @param  array  $data     数据
	 * @return xml          [description]
	 */
	public static function xml($code,$message='',$data=array()){
		if(!is_numeric($code)){
			return '';
		}
		$result = array(
			'code'=>$code,
			'message'=>$message,
			'data'=>$data
		);
		header('content-type:text/xml');
		$xml = "<?xml version='1.0' encoding='UTF-8'?>";
		$xml .="<root>";
		$xml .= self::xmlToEncode($result);
		$xml .="</root>";
		echo $xml;
	}

	public static function xmlToEncode($data){
		$xml = $attr ='';
		foreach ($data as $key => $value) {
			if(is_numeric($key)){
				$attr= " id='{$key}'";
				$key = "item"; 
			}
			$xml .="<{$key}{$attr}>";
			// if(is_array($value)){
			// 	$xml .= self::xmlToEncode($value);
			// }else{
			// 	$xml .=$value;
			// }
			$xml .= is_array($value)?self::xmlToEncode($value):$value;
			$xml .="</{$key}>";
		}
		return $xml;
	}
}