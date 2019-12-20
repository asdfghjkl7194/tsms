<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* 主页面*/
//Route::get('/', function () {
//  return view('welcome');
//});
Route::get('/','admin\Index@index')->middleware('adminShow'); // 直接进入后台

/* 后台登录*/
Route::get('admin/login','admin\Login@login'); // 展示登录
Route::post('admin/login_do','admin\Login@login_do'); // 执行登录

/* 后台*/
Route::prefix('admin')->middleware('adminShow')->group(function(){
	/* 主页*/
	Route::prefix('/')->group(function(){
		Route::get('index','admin\Index@index'); // 展示主页
	});
	
	
	/* 品牌管理*/
	Route::prefix('brand')->group(function(){
		Route::get('add','admin\Brand@add');
		Route::get('list','admin\Brand@list');
	});
	
	
	/* 新shangpin管理*/
	Route::prefix('goods')->group(function(){	// 这里的名字,我改了不在是shangpin
		Route::get('add','admin\Shangpin@add');
		Route::get('list','admin\Shangpin@list');
	});
	
	
	/* 分类管理*/
	Route::prefix('category')->group(function(){
		Route::get('add','admin\Category@add');
		Route::get('list','admin\Category@list');
	});
	
	
	/* 管理员管理*/
	Route::prefix('user')->group(function(){	// 这里的名字,我改了不在是goods
		Route::get('add','admin\Goods@add');
		Route::get('list','admin\Goods@list');
	});
	
	
	/* 管理员2*/
	Route::prefix('users')->group(function(){	// 这里的名字,我改为users
		Route::get('add','admin\Index@login');
	});
	
});















/* 呵呵做了这么久发现没用*/
/* 原生技术封装-底部路由*/
/*function a($a){
	Route::get('add', 'admin\\'.$a);
	Route::get('list','admin\\'.$a);
}
function b($a){
	// 公共区域
	$data = [
		'can'	=> $a,
	];
	session_start();
	$_SESSION['routess']=$data;
	
	// 添加区域
	Route::get('add',function(){
		dd($_SESSION['routess']['can'].'添加');
	});
	
	// 展示区域
	Route::get('list',function(){
		dd($_SESSION['routess']['can'].'展示');
	});
}*/


//function b($a){
//	global $a;
//	Route::get('add',function(){
//		global $a;
//		dd($a.'添加');
//	});
//	Route::get('list',function(){
//		global $a;
//		dd($a.'展示');
//	});
//}


/*function b($a){
	$data = [
		'can'	=> $a,
	];
	
//	setcookie('routess','123');
//	dd($_COOKIE('routess'));		// 报错

//	$cookie = cookie('name', '学院君', 1);
//	return response('欢迎来到 Laravel 学院')->cookie($cookie); // 找不到地址
//	$res = $value = request()->cookie('name');
//	dump($res);						// null

//	session_start();
//	$_SESSION['routess']='123';
//	dd($_SESSION['routess']);

//	session(['a'=>'永久存储A']);
//	request()->session()->save();		// 这里是保存的意思
//	dump(request()->session()->all());
	
}*/


/* 失败-存cookie里吧*/
//function b($a){
//	b3($a.'添加');
//}
//
//function b2($a=''){
//	return $a; // 存储$a;
//}
//
//function b3($a){
//	b2($a);
//	Route::get('add',function(){
//		dump(b2());
//		dump('尾部');
//	});
//}


/* 封装路由函数-多参数返回,最终在调用主函数*/
//function b($a){
//	$a = b2($a);
//	Route::get('add',function(){
//		global $a;
//		dd($a);
//	},$a);
//}
//function b2($a){
//	return $a.'添加';
//}
//
//function b3($a){
//	global $a;
//	Route::get('add',function(){
//		global $a;
//		dd($a.'添加');
//	});
//	Route::get('list',function(){
//		global $a;
//		dd($a.'展示');
//	});
//}

//想法备份

//function b2($a){
//	return $a.'添加';
//}
//
//function b3($a){
//	Route::get('add',function b($a){
//		$a = b2($a);
//		b3($a);
//		return false;
//	});
//}


/* 封装路由-失败,这次是因为无法两个文件同时执行,也不可能静态文件,等*/
//function b(){
//	Route::get('add',function(){
//		$b2 = b2(1);
//		dd($b2);
//		dump('添加');
//	});
//	Route::get('list',function(){
//		dump('展示');
//	});
//};
//function pub($a){
//	b2($a);
//	
//	b();
//	dump($a);
////	b2($a);
//};
//function b2($a){
//	dump($a.'????');
//	return '6699';
//};
//static function b2($a){
//	dd('123');
//};


/* 封装路由-失败*/
//global $a;
//function b($a){
//	global $a;
//	$a = '456';
//	
//	Route::get('add',function($a){
//		
//		dd(pub());
//	});
//	Route::get('list',function(){
//		dd('展示');
//	});
//}
//dump($a.'!!!!!!!!!');
//
//
//function pub(){
//	
//	
//	dump($a);
//	dump($a .= '789');
//	
//	$a .= '添加';
//	return $a;
//}


/* 封装路由-失败*/
//Route::get('add',function(){
//	public static function b($a){
//		dd($a.'添加');
//	}
//});
//Route::get('list',function(){
//	public static function b($a){
//		dd($a.'展示');
//	}
//});


/* 封装路由-失败,无法传参*/
//function a($a){
//	Route::get('add','admin\\'.$a);
//	Route::get('list','addmin\\'.$a);
//}
//function b($a){
//	global $a;
//	Route::get('add',function(){
//		global $a;
//		dd($a.'添加');
//	});
//	Route::get('list',function(){
//		global $a;
//		dd($a.'展示');
//	});
//}
