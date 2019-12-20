<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	
	protected $table = 'shop_category';
    protected $primaryKey = 'cate_id';
    
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

	static function id(){
		return self::where('cate_id', '=', input('cate_id'));
	}
}
