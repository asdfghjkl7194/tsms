<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'shop_goods';
    protected $primaryKey = 'goods_id';
    
    /**
	* 表明模型是否应该被打上时间戳
	* 关闭时间
	* @var bool
	*/
	public $timestamps = false;

    
    /**
	* 不能被批量赋值的属性
	* 黑名单
	* @var array
	*/
	protected $guarded = ['_token'];
    
    static function nihaokan(){
    	echo "你真好看";
    }
    static function goods_id(){
    	return self::where('goods_id', '=', input('goods_id'));
    }
    static function goods_name(){
    	return self::where('goods_name', '=', input('goods_name'));
    }
}
