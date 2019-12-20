<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	protected $table = 'shop_brand';
    protected $primaryKey = 'brand_id';
    
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
}
