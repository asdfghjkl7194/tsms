<div class="main-content">
<div class="breadcrumbs" id="breadcrumbs">
	<script type="text/javascript">
		try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
	</script>

	<ul class="breadcrumb">
		<li>
			<i class="icon-home home-icon"></i>
			<a href="#">首页</a>
		</li>
		<li class="active">安居客控制台</li>
		<li class="active">房源管理</li>
		<li class="active">账号设置</li>
		<li class="active">账号记录</li>
	</ul><!-- .breadcrumb -->
</div>

<div class="page-content">
		<div class="row">
				<div class="col-xs-12">
					<div class="table-responsive">
<form>
	<input type="text" name="goods_name" id="" value="{{request()->goods_name}}" placeholder="用户名"/>
	<input type="text" name="goods_url" id="" value="{{request()->goods_url}}" placeholder="地址"/>
	<input type="submit" value="筛选"/>
</form>
						<table id="sample-table-1" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="center">
										<label>
											<input type="checkbox" class="ace" />
											<span class="lbl"></span>
										</label>
									</th>
									<th>账号id</th>
									<th>用户名</th>
									<th>密码</th>
									<th>图片</th>
									<th>网址</th>
									<th>添加时间</th>
									<th>操作</th>
								</tr>
							</thead>

							<tbody>
@if(!empty($goods))
@foreach($goods as $v)
	<tr goods_id="{{$v->goods_id}}">
		<td class="center">
			<label>
				<input type="checkbox" class="ace"/>
				<span class="lbl"></span>
			</label>
		</td>
		<td>{{$v->goods_id}}</td>
		<td goods="goods_name">{{$v->goods_name}}</td>
		<td goods="goods_pwd">{{$v->goods_pwd}}</td>
		<!-- // !!!-->
		<td img="goods_img" style="position: relative;width: 120px;"><img src="/static/img/{{$v->goods_file}}" width="100px" height="60px"/></td>
		<td goods="goods_url" style="width: 150px;">{{$v->goods_url}}</td>
		<td>{{date("Y-m-d H:i:s",$v->goods_time)}}</td>
		<td>
			<button class="btn compile">编辑</button>
			<button class="btn btn-danger del">删除</button>
		</td>
		
	</tr>

@endforeach
@endif
							</tbody> </table>
{{$goods->links()}}
					</div><!-- /.table-responsive -->
				</div><!-- /span -->
			</div><!-- /row -->
</div><!-- /.page-content -->
</div><!-- /.main-content -->
<div class="ace-settings-container" id="ace-settings-container">
<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
	<i class="icon-cog bigger-150"></i>
</div>
<div class="ace-settings-box" id="ace-settings-box">
	<div>
		<div class="pull-left">
			<select id="skin-colorpicker" class="hide">
				<option data-skin="default" value="#438EB9">#438EB9</option>
				<option data-skin="skin-1" value="#222A2D">#222A2D</option>
				<option data-skin="skin-2" value="#C6487E">#C6487E</option>
				<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
			</select>
		</div>
		<span>&nbsp; 选择皮肤</span>
	</div>

	<div>
		<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
		<label class="lbl" for="ace-settings-navbar"> 固定导航条</label>
	</div>

	<div>
		<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
		<label class="lbl" for="ace-settings-sidebar"> 固定滑动条</label>
	</div>
 
	<div>
		<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
		<label class="lbl" for="ace-settings-breadcrumbs">固定面包屑</label>
	</div>

	<div>
		<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
		<label class="lbl" for="ace-settings-rtl">切换到左边</label>
	</div>
	<div>
		<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
		<label class="lbl" for="ace-settings-add-container">
			切换窄屏
			<b></b>
		</label>
	</div>
</div>
</div><!-- /#ace-settings-container -->
<!--<input type="file" name="_file" id="_file" value="" />-->
<!--<input type="button" name="gengxin" id="gengxin" value="更新" />-->
<iframe src="" id="_iframe" name="form_file" width="104" height="64" frameborder="1" scrolling="no" noresize="noresize" style="position: absolute;left: 6px;top: 6px;display: none;/*opacity: 0;*/"></iframe>
<script src="__STATIC__/jquery.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function(){
	// 即点即改
	var _text;							// 保存当前内容
//	var _click = false;					// 防止重复点击	使用新的方法直接上一个提示错误
	$(document).on("click","tr td[goods]", function(){
//		alert($("#click_val").length)
		if($("#click_val").length > 0){
			if($(this).children('input').length == 0 && $(this).children('textarea').length == 0){								// 判断当前点击的内容里面有没有input和textarea框没有清空所有框
				$("#click_val").parent().html('<input type="text" size="6" value="修改失败" style="border: none;color: red;background:none;"/><br>'+_text);
			}
			return;
		}								// 当内容是否是input框否则变为input 原因是内容点不上
//		if(_click){ return; }; _click = true;
		var _obj	=	$(this);		// 获取对象
			_text	=	_obj.text();	// 获取内容
		var _length =	(_text.length)*1.5;
		if(_length > 10){
//			var _inp	=	_obj.html('<textarea type="text" size="'+_length+'" id="click_val"/>'+_text+'</textarea>');			// 看看哪里错了
			var _inp	=	_obj.html('<textarea type="text" size="'+_length+'" id="click_val" autofocus>'+_text+'</textarea>');
		}else{
			var _inp	=	_obj.html('<input type="text" size="'+_length+'" id="click_val" value="'+_text+'" autofocus/>');
		}
	})
	$(document).on("blur", "#click_val", function(){
		var _obj	=	$(this);		// 获取对象
		var _val	=	_obj.val();		// 获取内容
		var _du		=	_obj.parent().attr('goods');			//获取字段
		var _id		=	_obj.parents("tr").attr('goods_id');	// 获取要改id
		$.get("list_ajax", {goods_id:_id,du:_du,val:_val}, function(str){
//			_click = false;
			if(str != 1){
				_obj.parent().html('<input type="text" size="6" value="修改失败" style="border: none;color: red;background:none;"/><br>'+_text);
				return;
			};
			_obj.parent().html(_val);
		});
	});
	function click_val_bllur(){}
/*	$(document).on("click","tr td[img]", function(){					// 图片点击改变		有些麻烦改为移动上面自动执行
		var goods_id = $(this).parents("tr").attr("goods_id");
//		$("#_iframe").prop('src',"public/form_file?"+goods_id);			// public里面禁止访问
//		alert(goods_id);
		$("#_iframe").prop('src',"/index/form_file?"+goods_id);
	});*/
	
// 图片即点即改耗时6+2~3=8小时左右记者复习总结思路共试验了10+68张图片
	var real_time;														// 鼠标到图片上时时监控
	var real_time_pd = false;											// 判断内容是否开始监控
	var goods_id;														// 获取修改id	作用：传给内联框架
	var yanchi;
	$(document).on("mouseover", "tr td[img='goods_img']", function(){
		clearTimeout(yanchi);											// 下两个这么写因为图片点击有事后就不换了
		clearInterval(real_time);
		$("tr td[img='goods_img']").attr('img', 'goods_imgs');			// 根据改变自定义函数获取要修改的是那一个图片
		$("#_iframe").css("display","block");							// 显示，内联框架，框框
		$(this).attr('img', 'goods_img');								// 要修改本行
		if(real_time_pd){return;}
		real_time_pd = true;
		real_time = setInterval(function(){
//			if(!real_time_pd){return;}									// 防止鼠标移动过快继续监控
			yanchi = setTimeout(function(){
				upd_file_val();
			},500);
		},250);															// 实时监测是否内容改变
		goods_id = $(this).parents("tr").attr("goods_id");				// 获取修改id	作用：传给内联框架
		var _ifr_src = $("#_iframe").prop('src');
		var _goods_id = _ifr_src.substr(_ifr_src.indexOf('?')+1);
		if(_goods_id == goods_id){										// 判断内容是否一致，用途：拖动图片后不刷新内联框架，
			return;
		};
		$("#_iframe").prop('src',"/index/form_file?"+goods_id);			// id传给内联框架
		$(this).append($("#_iframe")); 									// 将内联框架放到当前图片下
	});
	$(document).on("mouseout", "tr td[img='goods_img']", function(){
		yanchi = setTimeout(function(){
			$("tr td[img='goods_imgs']").attr('img', 'goods_img');		// 修复图片可以继续添加
		},500);
		clearInterval(real_time);										// 停止实时监控响应回来的数据
		real_time_pd = false;
	});
//	$(document).on("click","#gengxin", function(){						// 获取修改后的内容
	function upd_file_val(){
//		var _iframe = $("#_iframe");
//		var _iframe_data = _iframe.contentWindow.document.getElementsByTagName("body")[0].innerHTML;
		var $iframe1 = $("#_iframe").contents();
		var html1 = $iframe1.find('html');
		var body1 = $iframe1.find('body');
		var _html = body1.text();
		var guo = _html.substr(0,2);
		console.log(_html);
		if(guo == 20){
			$("tr td[img='goods_img']").children('img').prop("src","/static/img/"+_html);	//替换图片
			$("tr td[img='goods_imgs']").attr('img', 'goods_img');		// 修复图片可以继续添加
			clearInterval(real_time);									// 停止实时监控响应回来的数据
			real_time_pd = false;										// 可以继续监控
			$("tr td[img='goods_img']").children('input').remove(); 	// 删除修改失败
			$("#_iframe").css("display","none");						// 隐藏，内联框架（因为有字），框框  拖动的文件文字不行，因为用了修复，同内容不会进行加载iframe框架鼠标在上面就显示 了所以下面让他重新加载一下
			$("#_iframe").prop('src',"/index/form_file?"+goods_id);		// id传给内联框架
//			$("tr td[img='goods_img']").append($("#_iframe")); 								// 将内联框架放到当前图片下  不知道为什么复制动脑啊，一开始还this呢
//			alert('获取图片成功');
		}else if(guo == 'no'){
			$("tr td[img='goods_img']").append('<input type="text" size="6" value="修改失败" style="border: none;color: red;background:none;"/>');									// 替换图片
			$("tr td[img='goods_imgs']").attr('img', 'goods_img');		// 修复图片可以继续添加
			clearInterval(real_time);									// 停止实时监控响应回来的数据
			real_time_pd = false;										// 可以继续监控
			$("#_iframe").css("display","none");						// 隐藏，内联框架（因为有字），框框
		}
	};
//	});
//	$(document).on("change","#_file", function(){				// 检测内容		真好用不到，传过去你放那个文件夹里呢
//		var _val = $("#_file").val();
//		_val = _val.substr(_val.lastIndexOf('\\')+1,);
//		console.log("???+"+_val+"+???");
//	});

	// 删除
	$(document).on("click", ".del", function(){
		if(!confirm('确定删除')){return;}
		var goods_id = $(this).parents("tr").attr("goods_id");
		location.href="{:url('goods/goods_del')}?goods_id="+goods_id;
	});
	// 编辑
	$(document).on("click", ".compile", function(){
		var goods_id = $(this).parents("tr").attr("goods_id");
		location.href="{:url('goods/goods_compile')}?goods_id="+goods_id;
	});
});
</script>
			