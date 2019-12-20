<?php
	
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\Goods as User;
class Goods extends Common
{
    // 品牌添加页面
    function add(){
		//echo '商品添加页面';
//		admin_show();
		return view('admin.goods.add');
	}
	// 接收添加的内容
	function add_do(){
		$data = input();
		// dump($data);die;
		if(empty($data['goods_name'])){
			$this->error('用户名不可为空');
		}else{
			$res = User::goods_name()->find();
			if($res){
				$this->success('用户名重复请重新输入');
			}
		}
		if(empty($data['goods_pwd'])){
			$this->error('密码不可为空');
		}
		if(empty($data['goods_url'])){
			$this->error('地址不可为空');
		}else{
			//http://1907shop.com/admin.php/goods/add.html
			if(substr($data['goods_url'],0,4) != 'http'){
				$this->error('地址必须以http开头');
			}
		}
		
		if($_FILES['goods_file']['error'] == 0){
			$file = request()->file('goods_file');						// 不足
			$info = $file->move('./static/img');						// 不足
			$data['goods_file'] = str_replace('\\','/',$info->getSaveName());					// 不足
		}
		$data['goods_time'] = time();
		$res = model('goods')->save($data);								// 严重不足
		if($res){
			$this->success('添加成功', 'Goods/list');
		}else{
			$this->error('添加失败');
		}
	}

	// 品牌展示页面
	function list(){
		
		$query = request()->all();
		$where = [];
		if(!empty($query['goods_name'])){
			$where[] = ['goods_name', 'like', "%".$query['goods_name'].'%']; 
		}
		if(!empty($query['goods_url'])){
			$where[] = ['goods_url', 'like', "%".$query['goods_url']."%"]; 
		}
//		$show = User::where($where)->paginate(2,false,['query'=>$query]);
		$goods = User::where($where)->paginate(2);
		return view('admin.goods/list',['goods'=>$goods]);
	}
	// 即点即改
	function list_ajax(){
		$res = User::goods_id()->update([input('du') => input('val')]);
		if($res){ echo 1; }
	}
	// 修改图片 即点即改,这里不是重点
	function ajax_img(){
		$data = [];
		if($_FILES['goods_file']['error'] == 0){
			$file = request()->file('goods_file');
			$info = $file->move('./static/img');
			$data['goods_file'] = str_replace('\\','/',$info->getSaveName());
		}
		$res = User::goods_id()->update($data);
		$data = User::goods_id()->value('goods_file');
		if($res){ echo '<input type="text" value="图片正在加载" style="width: 100px; height: 60px; background: #FFA500; color: white; position: absolute; top: 0; left: 0;"/>'.$data; }else{echo 'no';};
//		if($res){ echo 'no'; }else{echo 'no';};
	}
	
	// 删除内容
	function del(){
		$goods_id = input('goods_id');
		$database = model('goods');
		$res = $database->where('goods_id', '=', $goods_id)->delete();
		$res ? $this->redirect('goods/list') : $this->error('删除失败');
	}
	function goods_del(){
		User::nihaokan();
		$res = User::goods_id()->delete();
		if($res){
			$this->redirect('goods/list');
		}else{
			$this->error('删除失败');
		}
	}
	// 点击修改内容 这里这里是编辑
	function goods_compile(){
//		$data = User::where('goods_id', '=', input('goods_id'))->find();
		$data = User::goods_id()->find();
		$this->assign('data', $data);
		return view('complie');
	}
	function goods_compile_do(){
		$data = input();
		// 验证用户名唯一	将自己排除
			$res = User::goods_name()->where('goods_name', 'neq', input('goods_name'))->find();
			if($res){
				$this->success('用户名重复请重新输入');
			}
		$goods_id = $data['goods_id'];
		unset($data['goods_id']);
		$data['goods_time'] = time();
		if($_FILES['goods_file']['error'] == 0){
			$file = request()->file('goods_file');						// 不足
			$info = $file->move('./static/img');						// 不足
			if($info){
				$data['goods_file'] = str_replace('\\','/',$info->getSaveName());// 不足
				// 删除原文件
				$del_img = User::goods_id()->value('goods_file');	// 获取图片路径\
				unlink('./static/img/'.$del_img);					// 删除原文件
			}
		}
		$res = User::goods_id()->update($data);								// 严重不足
//		dump($res);die;
		if($res == 1){			// 因为时间会变所以内容会一直保持修改成功
			$this->success('修改成功', 'Goods/list');
		}else if($res == 0){
			$this->error('内容没做修改');
		}else{
			$this->error('修改失败');
		}
	}
}
