<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;
use App\Admin\Admin2 as ad2;

class Login extends Controller
{
	
	function initialize(){
		if(session('idName')){
			$this->redirect('index/index');
		}
	}
	// 后台登录 接收信息
    function login(Request $request){
    	return view('admin.login.login');
    }
    function login_do(Request $request){
    	$where = [
    		['name','=',$request->name],
    		['pwd','=',md5($request->pwd)]
    	];
    	$res = ad2::where($where)->first();
    	if($res){
    		ad2::where($where)->update(['ip'=>$request->ip(), 'time'=>time()]);
    		session(['id'=>$res->id, 'name'=>$res->name]);
    		$request->session()->save();
    		return redirect('admin/index');
    	}else{
    		dd('用户名或密码错误');
    	}
    }
    
}
