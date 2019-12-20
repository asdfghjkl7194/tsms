<div class="main-content">
<div class="breadcrumbs" id="breadcrumbs">
	<script type="text/javascript">
		try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
	</script>

	<ul class="breadcrumb">
		<li>
			<i class="icon-home home-icon"></i>
			<a href="#">category</a>
		</li>
		<li class="active">分类展示</li>
		<li class="active">category</li>
	</ul><!-- .breadcrumb -->
</div>

<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
				<a href="{:url('category/list?tr_cool=true')}" class="btn" type="reset">
					<i class="icon-undo bigger-110"></i>
					全部展示
				</a>
				<a href="{:url('category/list?tr_cool=false')}" class="btn" type="reset">
					<i class="icon-undo bigger-110"></i>
					全部隐藏
				</a>
				<form style="display: inline-block;">
					<input type="number" name="cate_id" id="" value="{{request()->get('cate_id')}}" size="6" placeholder="分类id" style="width: 76px;"/>
					<input type="text" name="cate_name" id="" value="{{request()->get('cate_name')}}" size="12" placeholder="名称筛选"/>
					<div style="display: inline-block;position: relative;top: 8px;">
						<span style="position: absolute;top: -20px;left: 6px;">展示</span>
						@if($_GET['cate_show'] ?? '' == 2)
							<label> <input type="radio" name="cate_show" value="1" />√ </label>
							<label> <input type="radio" name="cate_show" value="2" checked/>× </label>
						@else
							<label> <input type="radio" name="cate_show" value="1" checked/>√ </label>
							<label> <input type="radio" name="cate_show" value="2" />× </label>
						@endif
					</div>
					<div style="display: inline-block;position: relative;top: 8px;width: 66px;text-align: center;">
						<span style="position: absolute;top: -20px;left: 4px;">标题展示</span>
						@if($_REQUEST['cate_new_show'] ?? '' == 1)
							<label> <input type="radio" name="cate_new_show" value="1" checked/>√ </label>
							<label> <input type="radio" name="cate_new_show" value="2" />× </label>
						@else
							<label> <input type="radio" name="cate_new_show" value="1" />√ </label>
							<label> <input type="radio" name="cate_new_show" value="2" checked />× </label>
						@endif						<!--楼下不推荐1.当选择第二个,第一个默认选中,根据代码一次执行所以,还是会选中第二个-->
						<!--<label> <input type="radio" name="cate_new_show" value="1" {//input('cate_new_show') == 1 ? 'checked' ? ''}/>√ </label>
						<label> <input type="radio" name="cate_new_show" value="2" checked {//input('cate_new_show') == 2 ? 'checked' ? ''}/>× </label>-->
					</div>
					<input type="submit" value="筛选"/>
				</form>
			<div class="table-responsive">
				<table id="sample-table-1" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>分类id</th>
							<th>名称</th>
							<th>展示</th>
							<th>标题展示</th>
							<th>操作</th>
						</tr>
					</thead>

					<tbody>
						@if(!empty($data))
						@foreach($data as $v)
								@if($v['nbsp']-1 == 0)
								<tr cate_id="{{$v->cate_id}}" parent_id="{{$v->parent_id}}">
									<td class="tr_show"><a href="javascript:;" class="cata_id" name="{{$v->cate_name}}">+</a><span>{{$v->cate_id}}</span></td>
									<td name1="cate_name"><span>{{$v->cate_name}}</span></td>
									<td name2="cate_show" val="{{$v['cate_show']}}"><span> @if($v['cate_show'] == 1) √ @else × @endif </span></td>
									<td name2="cate_new_show" val="{{$v->cate_new_show}}"><span> {{$v->cate_new_show == 1 ? '√' : '×'}} </span></td>
									<td>
										<a href="JavaScript:;" update="update">修改</a>
										<a href="JavaScript:;" click_del="delete">删除</a>
									</td>
								</tr>
							@else
								<tr cate_id="{{$v->cate_id}}" parent_id="{{$v->parent_id}}" style="display: none;">
									<td class="tr_hide">{!! str_repeat('&nbsp;&nbsp;',($v->nbsp-1)*3) !!}<a href="javascript:;" class="cata_id">+</a><span>{{$v->cate_id}}</span></td>
									<td name1="cate_name">{!! str_repeat('&nbsp;&nbsp;',($v->nbsp-1)*5) !!}<span>{{$v->cate_name}}</span></td>
									<td name2="cate_show" val="{{$v['cate_show']}}"> <span> @if($v['cate_show'] == 1) √ @else × @endif</span> </td>
									<td name2="cate_new_show" val="{{$v['cate_new_show']}}"> <span> @if($v['cate_new_show'] == 1) √ @else × @endif </span> </td>
									<td>
										<a href="JavaScript:;" update="update">修改</a>
										<a href="JavaScript:;" click_del="delete">删除</a>
									</td>
								</tr>
							@endif
						@endforeach
						@endif
					</tbody>
				</table>
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
<script src="__STATIC__/jquery.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function(){
// 点击修改
	$(document).on("click", "tr td [update]", function(){
		var _this = $(this);// 获取对象
		var cate_id = _this.parents('tr').attr("cate_id");// 获取当前id
		location.href="{:url('category/update')}?cate_id="+cate_id;
	});
// 点击删除,判断子类是否有内容
	$(document).on("click", "tr td [click_del]", function(){
		var _this = $(this);// 获取对象
		var cate_id = _this.parents('tr').attr("cate_id");
		var zi_coun = $("[parent_id="+cate_id+"]").length;
		if(zi_coun > 0){
			alert('不可删除');
		}else{
			if(confirm('是否确认删除')){
				location.href="{:url('category/click_del')}?cate_id="+cate_id;
				
//				$.get("{:url('category/click_del')}", {cate_id:cate_id}, function(rey){
//					if(rey != 1){
//						alert("删除失败");
//					}
//				});
			};
		}
	});
// 判断点击改变
	$(document).on("click", "td[name2]", function(){
		var obj = $(this);		// 获取当前标签
		var _text = obj.attr('val');	// 获取要修改的字段
		if(_text == 1){			// 这里使用√需要点两下因为php到js里对号改变了
			var _val = 2;
			var fuhao = "×";
		}else{
			var _val = 1;
			var fuhao = "√";
		}
		var _id  = obj.parents("tr").attr('cate_id');
		var _field = obj.attr("name2");
		$.get("{:url('category/click_upd')}", {_id:_id,_field:_field,_val:_val}, function(rey){
			if(rey == 1){
				obj.attr('val',_val);
				obj.text(fuhao);
			}
		});
	//console.log($(this).attr('val'))
	});
// 点击失去焦点
	var _text;						// 旧的值
	$(document).on("blur", "#click_val", function(){
		var obj = $(this);
		var _id  = obj.parents("tr").attr('cate_id');
		var _field = obj.parents('td').attr("name1");
		var _val = obj.val();
		$.get("{:url('category/click_upd')}", {_id:_id,_field:_field,_val:_val}, function(rey){
			if(rey == 1){
				obj.parent().text(_val);
			}else{
				obj.parent().text(_text);
			}
		});
	});
// 点击变成文本框
	$(document).on("click", "td[name1]", function(){
		// 特殊问题判断是否是文本框
			if($("#click_val").length >= 1){
				if($(this).find('input').length != 1){
					$("#click_val").parent().html($("#click_val").val());
				}
				return;
			}
		_text = $(this).children('span').text();
		$(this).children('span').html('<input type="text" size="'+(_text.length)*1.5+'" id="click_val" value="'+_text+'" autofocus/>');
	});
// 全部展示全部隐藏
	var _tr_hide = "{$tr_cool|default=false}";				// 这里第一次不赋值内容默认值也不管用所以用标签吧空值false
	if(_tr_hide == "true"){
		$("a[class='cata_id']").remove();
		$(".tr_hide").parent().show();
	}
// 点击显示
	$(document).on("click", "a[class='cata_id']", function(){
		var _this = $(this);// 这个对象
		var _text = _this.text();// 获取符号
		var _id = _this.parents('tr').attr('cate_id');// 获取本行id
		var _zi = $("[parent_id="+_id+"]").length;
		// 判断下一层是否由内容
			//var _zi = $("[parent_id='"+_id+"']").attr('cate_id');// 获取子元素id
			//var _zzi = $("[parent_id='"+_zi+"']").length;// 获取子子元素个数
		if(_text == '+'){
			//if(_zi != 0){
				$("[parent_id="+_id+"]").show();	// 这里显示,获取他的id,判断他子元素有内容吗,有显示加好,没有删除加好
				_this.text("-");
				show_bug(_id);
			//}
			// 判断下一层是否由内容
				//if(_zzi == 0){
				//	$("[parent_id='"+_id+"'] a").remove();
				//}
		}else{
			_this.text('+')
			$("[parent_id="+_id+"]").hide();
			shrink(_id);
		}
	});
	function show_bug(_id){			// 展示bug修复
		var idz2 = $("[parent_id='"+_id+"']");// 第二个子元素id
		idz2.each(function(index){
			var _this = $(this);
			var idz3 = _this.attr('cate_id');
			var idz3_obj = $("[parent_id="+idz3+"]");
			var idz3_len = idz3_obj.length;
			//console.log(idz3_len);
			if(idz3_len == 0){
				_this.find("a[class='cata_id']").remove();
			//	alert(1)
			}
		});
	}
	function shrink(_id){			// 收缩 bug修复型
		var _tr = $("tr[parent_id='"+_id+"']");
		_tr.each(function(index){
			$(this).hide();
			$(this).find("a[class='cata_id']").text("+");
			var c_id = $(this).attr('cate_id');
			// console.log(c_id);
			shrink(c_id);
		});
	}
// 点击隐藏
	$(document).on("click", ".tr_show1", function(){
		$(this).attr('class','tr_show');
		$("tr[parent_id='"+$(this).parent().attr("cate_id")+"']").hide();
	});
//第一代显示隐藏
	// 点击显示
		//$(document).on("click", ".tr_show", function(){
		//	$(this).attr('class','tr_show1');
		//	$("tr[parent_id='"+$(this).parent().attr("cate_id")+"']").show();
		//});
	// 点击隐藏
		//$(document).on("click", ".tr_show1", function(){
		//	$(this).attr('class','tr_show');
		//	$("tr[parent_id='"+$(this).parent().attr("cate_id")+"']").hide();
		//});

});

</script>