<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'shop_admin';
    protected $primaryKey = 'id';
    
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
