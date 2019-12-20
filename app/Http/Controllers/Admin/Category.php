<?php
//商品管理

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\Category as User;

class Category extends Common
{
	// 添加页 接收添加
    function add(){
		$data = $this->getSaveInfo();
    	return view('admin.category.add',['data'=>$data]);
    }
	function add_do(){
		$query = input();
		if(empty($query['cate_name'])){
			$this->error('分类名称必填');
		}
		$where = [
			['cate_name','=',$query['cate_name']],
			['parent_id','=',$query['parent_id']]
		];
		$_find = User::where($where)->find();
		if(!empty($_find)){
			$this->error('商品名称重复');die;
		}
//		dump($query);
//		$res = User::save($query);	// 他不是静态的
		$res = User::insert($query);	// 他不是静态的
		if($res){
			$this->success('添加成功','category/list');
		}else{
			$this->error('添加失败');
		}
	}
    function list(){
    	$tr_cool = request()->get('tr_cool') ?: false;		// 如果有内容是true,没有赋值false
//  	dump($tr_cool);
//  	if(!$tr_cool){								// 没有内容是false取反为true赋值false
//  		$tr_cool = false;						// 有内容是true取反为false,不进入,
//  	}
    	
    	$q = request()->all();
    	$where = [];
    	if(!empty($q['cate_id'])){
    		$where[] = ['cate_id', '=', $q['cate_id']];
    	}
    	if(!empty($q['cate_name'])){
    		$where[] = ['cate_name', 'like', "%".$q['cate_name']."%"];
    	}
    	if(!empty($q['cate_show'])){
    		$where[] = ['cate_show', '=', $q['cate_show']];
    	}
    	if(!empty($q['cate_new_show'])){
    		$where[] = ['cate_new_show', '=', $q['cate_new_show']];
    	}
//  	dump($where);
		$data = $this->getSaveInfo($where);			// 条件
    	return view('admin.category.list',['tr_cool'=>$tr_cool,'data'=>$data]);
    }
    // 即点即改
    function click_upd(){
    	$id = input('_id');
    	$field = input('_field');
    	$val = input('_val');
    	$res = User::where([ 'cate_id' => $id ])->update([ $field => $val ]);
    	if($res){
    		echo 1;
    	};
    }
    //点击修改 接收
    function update(){
    	$one = User::id()->find();
		$data = $this->getSaveInfo();
    	$this->assign('one',$one);
    	$this->assign('data', $data);
    	return view();
    }
    function update_do(){
		$query = input();
		if(empty($query['cate_name'])){
			$this->error('分类名称必填');
		}
		$where = [
			['cate_name','neq',$query['cate_name']],
			['parent_id','=',$query['parent_id']]
		];
		$_find = User::where($where)->find();
		if(empty($_find)){
			$this->error('商品名称重复');die;
		}
		$res = User::where('cate_id','=',$query['cate_id'])->update($query);	// 他不是静态的
		if($res){
			$this->success('修改成功','category/list');
		}else{
			$this->error('修改失败');
		}
    }
    
    
    
    
    
	// 点击删除
	function click_del(){
	$cate_id = input("get.cate_id");
	$where = [
		['parent_id', '=', $cate_id]
	];
	// 验证是否有子类
		$info = User::where($where)->count();
		if($info > 0){
			$this->error('此类下有子类或商品使用,不可删除');die;
		}
	// 验证是否有商品使用这个分了类
		$goods_cate = model('shangpin')->where('cate_id', '=', input('cate_id'))->find();
		if($goods_cate){
			$this->error('此类下有商品或子类有使用,不可删除');die;
		}
	$res = User::id()->delete();
	if(!empty($res)){
		$this->success('删除成功', 'category/list');
	}else{
		$this->success('删除失败', 'category/list');
	}
//以下是ajax方法
//		$res = User::id()->delete();
//		if($res){
//			echo 1;
//		}
	}
}
