<?php
	
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin\Shangpin as User;
use App\Admin\Brand;
//use think\Db;

class Shangpin extends Common
{
	// 展示 添加
    function add(){
//  	admin_show();
    	$brand = Brand::get();
    	$cate = $this->getSaveInfo();
//  	dd($cate);
    	return view('admin.shangpin.add', ['brand'=>$brand,'cate'=>$cate]);
    }
    function add_do(){
    	$query = input();
    	if(empty($query['goods_name'])){ echo '商品名称不可为空'; die;}
    	$goods_name_one = User::name()->find();
    	if(!empty($goods_name_one)){
    		$this->error('商品名称重复');
    	}
    	if(empty($query['goods_price']) && $query['goods_price'] == ''){ echo '商品价格不可为空'; die;}
//  	if(empty($query['goods_no'])){ echo '货号自动生成未知````';}
    	if(empty($query['goods_num']) && $query['goods_num'] == ''){ echo '库存不可为空'; die;}
    	
//  	if(empty($query['goods_desc'])){ echo '赠送积分为可以为空';}
    	if(empty($query['goods_desc'])){ echo '详情不可为空'; die;}
    	if($_FILES['goods_img']['error'] != 0){ echo '图片异常'; die;}
    	if($_FILES['goods_imgs']['error'][0] != 0){ echo '相册异常'; die;}
    	
    	if(empty($query['brand_id'])){ echo '品牌必选'; die;}
    	if(empty($query['cate_id'])){ echo '分类必选'; die;}
    	
    	
		$query['goods_img'] = $this->upload();// 单图片
		$query['goods_imgs'] = $this->uploads();// 多图片,相册
		$res = User::insert($query);
		if($res){
			$this->success('添加成功', 'shangpin/list');
		}else{
			$this->error('添加失败');
		}
    }
    
    // 展示 修改
    function list(Request $request){
//  	$query = input('post.');// 接收所有值
//  	$query = $request->all();// 接收所有值
    	$query = $request->post();// 接收所有值
    	

    	$where = [];
    	if(!empty($query['goods_id']))		{$where[] 	= ['goods_id', 		'=', $query['goods_id']];};
    	if(!empty($query['goods_name']))	{$where[] 	= ['goods_name', 	'like', '%'.$query['goods_name'].'%'];};
    	if(!empty($query['goods_no']))		{$where[] 	= ['goods_no', 		'like', '%'.$query['goods_no'].'%'];};
		if(!empty($query['price_min']) 			|| !empty($query['price_max']))			{$where[] 	= self::min_max($query['price_min'], $query['price_max'], 'goods_price');}
		if(!empty($query['goods_desc']))	{$where[] 	= ['goods_desc',	'like', '%'.$query['goods_desc'].'%'];};
		if(!empty($query['goods_num_min']) 		|| !empty($query['goods_num_max']))		{$where[] 	= self::min_max($query['goods_num_min'], $query['goods_num_max'], 'goods_num');}
		if(!empty($query['goods_score_min']) 	|| !empty($query['goods_score_max']))	{$where[] 	= self::min_max($query['goods_score_min'], $query['goods_score_max'], );}
    	if(!empty($query['is_new']))		{$where[] 	= ['is_new', 		'=', $query['is_new']];};
    	if(!empty($query['is_best']))		{$where[] 	= ['is_best', 		'=', $query['is_best']];};
    	if(!empty($query['is_hot']))		{$where[] 	= ['is_hot', 		'=', $query['is_hot']];};
    	if(!empty($query['is_up']))			{$where[] 	= ['is_up', 		'=', $query['is_up']];};
    	if(!empty($query['brand_id']))		{$where[] 	= ['b.brand_id', 	'=', $query['brand_id']];};// 这里声明前面要声明在那里遍的id否则找不到
//  	if(!empty($query['cate_id']))		{$where[] 	= ['c.cate_id', 	'=', $query['cate_id']];};// 这里声明前面要声明在那里遍的id否则找不到
    	if(!empty($query['cate_id']))		{
    		$cateId = $this->getSaveId($query['cate_id']);
			//dump($cateId);
    		$where[] = ['c.cate_id', 'in', $cateId]; // 字符串加引号,数组不需要
    	};
    	
//  	self::min_max();
//		dump($where);
//		dump(Db::getLastSql());

    	$brand = Brand::get();// 品牌
    	$cate = $this->getSaveInfo();// 分类
    	
//  	$goods = User::field('g.*,brand_name,cate_name')
//  					->alias('g')
//  					->join('category c', 'g.cate_id=c.cate_id')
//  					->join('brand b', 'g.brand_id=b.brand_id')
//  					->where($where)
//  					->paginate(2,false,['query'=>$where]);
    	$goods = User::join('shop_category', 'shop_shangpin.cate_id', '=', 'shop_category.cate_id')
    					->join('shop_brand', 'shop_shangpin.brand_id', '=', 'shop_brand.brand_id')
    					->where($where)
    					->paginate(2);
    	
    	return view('admin.shangpin.list', ['brand'=>$brand,'cate'=>$cate,'goods'=>$goods]); // 品牌 分类 商品
    }
    function min_max($a,$b,$c){// 不要看这里看下面注释了的
    	if(!empty($a) && !empty($b)){
    		if($a>$b){
    			return [$c, 'between', [$b,$c]];
    		}
    		return [$c, 'between', [$a,$b]];
    	}else{
    		if(!empty($a)){
    			return [$c, '<', $a];
    		}else if(!empty($b)){
    			return [$c, '>', $b];
    		}
    	}
    }
//  function min_max($a,$b,$c){// 最小值,最大值,字段
//  	if(!empty($a) && !empty($b)){
//  		if($a<$b){// 大写写反自动颠倒		我抄,你符号写反了,没改自己动脑想想
//  			echo 1;
//  			return [$c, 'between', [$b,$c]];
////    			//return ['a', '>','b'];这个想法不对,这个说明晚上不要学习2019年10月18日22:37:09
////  			var c = a;	// 无语了当成js做了
////  			a = b;		// 再次无语,这个是价格不是库存嗷嗷嗷!!!2019年10月18日22:44:00
////  			b = c;
//  		}
//  			echo 2;
//  		return [$c, 'between', [$a,$b]];
//  	}else{
//  		if(!empty($a)){
//  			echo 3;
//  			return [$c, '<', $a];
//  		}else if(!empty($b)){
//  			echo 4;
//  			return [$c, '>', $b];
//  		}
//  	}
//  }


    function del(){
//  	$res = User::id()->find();
    	$res = User::id()->delete();
    	if($res){ echo 1; }
    }
    function upd(){
    	$brand = model('brand')->select();
    	$this->assign('brand',$brand);
    	$cate = $this->getSaveInfo();
    	$this->assign('cate',$cate);
    	$data = User::id()->find();
    	$this->assign('data',$data);
    	return view();
    }
    function upd_do(){
    	$query = input();
    	if(empty($query['goods_name'])){ echo '商品名称不可为空'; die;}
    	$where = [
    		//['goods_name', '=', $query['goods_name']],
    		['goods_id', '<>', $query['goods_id']]
    	];
      	$goods_name_one = User::name()->where($where)->find();
//  	$goods_name_one = model('shangpin')->where($where)->find();
//  	dump($query['goods_name']);
//  	echo '<br>';
//  		dump($goods_name_one);
//  		die;
    	if(!empty($goods_name_one)){
    		$this->error('商品名称重复');
    	}
    	if(empty($query['goods_price']) && $query['goods_price'] == ''){ echo '商品价格不可为空'; die;}
//  	if(empty($query['goods_no'])){ echo '货号自动生成未知````';}
    	if(empty($query['goods_num']) && $query['goods_num'] == ''){ echo '库存不可为空'; die;}
    	
//  	if(empty($query['goods_desc'])){ echo '赠送积分为可以为空';}
    	if(empty($query['goods_desc'])){ echo '详情不可为空'; die;}
//  	if($_FILES['goods_img']['error'] != 0){ echo '图片异常'; die;}
//  	if($_FILES['goods_imgs']['error'][0] != 0){ echo '相册异常'; die;}
    	
    	if(empty($query['brand_id'])){ echo '品牌必选'; die;}
    	if(empty($query['cate_id'])){ echo '分类必选'; die;}
    	
    	
    	if($_FILES['goods_img']['error'] == 0){
      		$query['goods_img'] = $this->upload();// 单图片
    	}
    	if($_FILES['goods_imgs']['error'][0] == 0){
      		$query['goods_imgs'] = $this->uploads();// 多图片,相册
    	}
		$res = User::id()->update($query);
		if($res){
			$this->success('修改成功', 'shangpin/list');
		}else{
			$this->error('修改失败');
		}
    }
    
    
    
    // 以下公用函数
    public function upload(){
		$file = request()->file('goods_img');
	    $info = $file->move('./static/shangpin/img/');
		if($info){
			return $info->getSaveName();
		}else{
			echo $file->getError();
		}
	}

    public function uploads(){
		$files = request()->file('goods_imgs');
		$data = '';
		foreach($files as $file){
			$info = $file->move('./static/shangpin/imgs/');
			if($info){
				$data .=  $info->getSaveName().'|';
			}else{
				continue;
			}
		}
		return rtrim($data,'|');
	}




}
