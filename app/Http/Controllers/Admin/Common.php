<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\Category as User;

class Common extends Controller
{
    function initialize(){
		if(!cookie('users')){
			$this->error('非法进入请登录', 'http://1907shop.com');
		}
		if(!session('idName')){
			$this->error('非法进入请登录', 'login/login');
		}
		$img = db("admin")->where('users', '=', cookie('users'))->find();		// 用户头像
   	 	$this->assign('img',$img['url']);
	}
	// 根据User可以知道这是分类用的
	//	function getSaveInfo($where=''){ // 条件用的位置忘了
	//		$data = User::where($where)->get();//->toArray();
	function getSaveInfo(){
		$data = User::get();//->toArray();
    	return getSaveInfo($data);
	}
	// 下两个方法一起
	function getSaveId($b){// 等级:分级=parent_id,
//		$data = User::column('cate_id','parent_id');	想多了不行是索引数组
		$data = User::get();
		dump($data);
//		dump($b);die;
		return self::getSaveIds($data,$b);
	}
	function getSaveIds($a,$b){// 不要看这里看下面注释的 内容,等级:分级,		//这里由于是双位数字所以转换为数组,下标也赋值为相同的数组就可以去除重复问题,并且tp5.可以使用in的数组
		static $c = [];
		$c[$b] = (int)$b;
		//$c .= $b.',';
		foreach($a as $v){
			if($v['parent_id'] == $b){
				//$c .= $v['cate_id'].',';
				$c[$v['cate_id']] = $v['cate_id'];
				self::getSaveIds($a,$v['cate_id']);
			}
		}
		//return rtrim($c,',');
		return $c;
	}
// 这个是10月18日讲的我没有听课,造成了时间的浪费,9点到现在2019年10月19日11:05:28.11点了.归根原因为用空格进行多选,应该是用','号,我都把数据一个一个对了一遍真的行
//	function getSaveIds($a,$b){// 内容,等级:分级,
//		static $c = '';// 这个放外面嗷嗷嗷		//放你个大爷的事静态的滚滚滚滚滚滚滚滚滚滚滚
//		$c .= $b.',';	// 动脑吧
////		echo $b.'<br>';
//		
//		foreach($a as $v){
//			if($v['parent_id'] == $b){	// 重点不足,理由存储太小,卡克严重不知怎么想,想对了,扩散到其他地方去了
////			echo '1>'.$v['parent_id'] .'=='. $b.'<br>';
////			echo '<2>'.$v['cate_id'].'<br>';	
//				$c .= $v['cate_id'].',';
////			echo '<3!'.$c.'<br>';
//				self::getSaveIds($a,$v['cate_id']);
//			}
//		}
//
//		echo $c.'?<br>';
//		return rtrim($c,',');
//	}
}
