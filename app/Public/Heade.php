<?php
/**
 * 公用的方法  返回json数据，进行信息的提示
 * @param $status 状态
 * @param string $message 提示信息
 * @param array $data 返回数据
 */
// 方法三
function admin_show($UD='', $content=''){ // 参数一: 填写数组   页面用用{{$UD['name']}}	调用  	  user 与  data 开头字母
	$users = session('name');			  // 参数二: 页面显示字
	$User_Data = App\Admin\Admin::where('users', '=', $users)->first();
	include('Public/layout.php');
}

/* 递归一*/
function getSaveInfo($a,$b = 0,$c = 1){// 数据库所有内容,等级,缩进
	static $d = [];
	foreach($a as $v){
		if($v['parent_id'] == $b){
			$v['nbsp'] = $c;
			$d[] = $v;
			getSaveInfo($a,$v['cate_id'],$c+1);
		}
	}
	return $d;
}
