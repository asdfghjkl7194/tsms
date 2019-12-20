<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\Brand as User;

class Brand extends Common
{
	// 进入添加 接收添加   这里是品牌添加页面
    function add(){
//		admin_show();
		return view('admin.brand.add');
	}
	function add_do(){
		$query = input();
		if($_FILES['brand_logo']['error'] == 0){
			$file = request()->file('brand_logo');
			$info = $file->move('./static/brand_img/');
			$query['brand_logo'] = str_replace('\\', '/', $info->getSaveName());
		}
		$res = User::insert($query);
		if($res){
			$this->success('上传成功','list');
		}else{
			$this->errir('上传失败');
		}
	}
	// 品牌展示页面
	function list(){
//		admin_show();
		$data = User::paginate(2);
		return view('admin.brand.list',['data'=>$data]);
	}
}
