<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\Admin;

class Index extends Controller
{
	function initialize(){
		$img = db("admin")->where('users', '=', cookie('users'))->find();
   	 	$this->assign('img',$img['url']);
	}
    public function index()
    {
   	 	// 方法一
// 	 	admin_show($img['url']);
//	   	return view('admin.index.index',['data1'=>$img['url']]); 这个写法不行,因为他吧参数给了内容页,在框架已经读取过去了

    	// 方法二
//  	$users = session('name');
// 	 	$img = Admin::where('users', '=', $users)->first();
// 	 	admin_show([
// 	 		'img'	=> $img['url'],
// 	 		'users'	=> $img['users'],
// 	 	]);
   	 	
   	 	// 方法三
//		admin_show();

		// 方法四 移动到中间件里了
	   	return view('admin.index.index');
    }
    function quite(){
    	dd(111);
      	$res = cookie('users',null);
      	$res = session('idName',null);
    	$this->success('退出成功', 'http://1907shop.com');
    }
// 后台注册  接收
	function login(){
		return view('admin.index.login');
	}
	function login_do(){
//		$data = [];
//		$data['users']	=	input("users");
//		$data['pwd']	=	input("pwd");
//		dump($data);
//		die;
		$query = input();
		$reg = '/^[a-z]\w{2,10}$/';
		// 验证用户名是否为空
			if(empty($query['users'])){
				$this->error('请填写用户名');
			}else if(!preg_match($reg,$query['users'])){
				$this->error('用户名包含数字，字母，下划线，不可数字开头的3-11位');
			}
		// 密码多重加密
			$pwd = $query['pwd'];									// 获取密码
			$pwd_md5 = $query['pwd_md5'] = rand(100,9999);			// 随机加密方式
			$query['pwd'] =	md5(md5($pwd_md5.$pwd).$pwd_md5);		// 相乘(不可以改为拼接)-加密-相接-加密
//			dump($query['pwd']);
		// 接收图片
			if($_FILES['url']['error'] != 0){
				$this->error('必须上传头像');
			}else{
				$file = request()->file('url');
				//$info = $file->move('./__STATIC__/topImg');				// 这里可以使用但是我是直接跳转到后台可能没有加载完毕。不推荐PHP中使用
				$info = $file->move('./static/topImg');
				if($info){
					$query['url'] = str_replace('\\','/',$info->getSaveName());
				}
			}
		$res = db('admin')->where('users', '=', $query['users'])->find();
		if($res){
			$this->error('用户名已存在');
		}else{
			$res = db("admin")->insert($query);
			if($res){
				cookie('users',$query['users']);
				$this->success('注册成功','http://1907shop.com/admin.php');
			}else{
				$this->error('注册失败');
			}
		}
	}
}
