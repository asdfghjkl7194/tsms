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
<div style="margin: 10px 0 10px 20px;position: relative;top: 6px;">
	<form style="display: inline-block;" method="post">
		<input type="number" name="goods_id" id="" value="{{request()->goods_id}}" placeholder="分类id" style="width: 66px;" min="0"/>
		<input type="text" name="goods_name" id="" value="{{request()->goods_name}}" placeholder="名称筛选" style="width: 66px;"/>
		<div style="display: inline-block;position: absolute;width: 66px;z-index: 1;top: -16px;">
			<input type="number" name="price_min" id="" value="{{request()->price_min}}" placeholder="最小价格" style="width: 66px;" min="0"/>
			<input type="number" name="price_max" id="" value="{{request()->price_max}}" placeholder="最大价格" style="width: 66px;" min="0"/>
		</div>
		<div style="width: 66px;display: inline-block;"> </div>
				<input type="text" name="goods_no" id="" value="{{request()->goods_no}}" placeholder="货号" style="width: 66px;"/>
				<div style="display: inline-block;position: absolute;width: 66px;z-index: 1;top: -16px;">
					<input type="number" name="goods_num_min" id="" value="{{request()->goods_num_min}}" placeholder="库存小" style="width: 66px;" min="0"/>
					<input type="number" name="goods_num_max" id="" value="{{request()->goods_num_max}}" placeholder="库存大" style="width: 66px;" min="0"/>
				</div>
				<div style="width: 66px;display: inline-block;"> </div>
				<div style="display: inline-block;position: absolute;width: 66px;z-index: 1;top: -16px;">
					<input type="number" name="goods_score_min" id="" value="{{request()->goods_score_min}}" placeholder="积分小" style="width: 66px;" min="0"/>
					<input type="number" name="goods_score_max" id="" value="{{request()->goods_score_max}}" placeholder="积分大" style="width: 66px;" min="0"/>
				</div>
				<div style="width: 66px;display: inline-block;"> </div>
				<input type="text" name="goods_desc" id="" value="{{request()->goods_desc}}" placeholder="详情" style="width: 66px;"/>
		<div style="display: inline-block;position: relative;top: 8px;">
			<span style="position: absolute;top: -20px;left: 6px;">新品</span>
			<label> <input type="radio" name="is_new" value="1" {{request()->is_new == 1 ? 'checked' : ''}}/>√ </label>
			<label> <input type="radio" name="is_new" value="2" {{request()->is_new == 2 ? 'checked' : ''}}/>× </label>
		</div>
		<div style="display: inline-block;position: relative;top: 8px;">
			<span style="position: absolute;top: -20px;left: 6px;">精品</span>
			<label> <input type="radio" name="is_best" value="1" {{request()->is_best == 1 ? 'checked' : ''}}/>√ </label>
			<label> <input type="radio" name="is_best" value="2" {{request()->is_best == 2 ? 'checked' : ''}}/>× </label>
		</div>
		<div style="display: inline-block;position: relative;top: 8px;">
			<span style="position: absolute;top: -20px;left: 6px;">热卖</span>
			<label> <input type="radio" name="is_hot" value="1" {{request()->is_hot == 1 ? 'checked' : ''}}/>√ </label>
			<label> <input type="radio" name="is_hot" value="2" {{request()->is_hot == 2 ? 'checked' : ''}}/>× </label>
		</div>
		<div style="display: inline-block;position: relative;top: 8px;">
			<span style="position: absolute;top: -20px;left: 6px;">上架</span>
			<label> <input type="radio" name="is_up" value="1" {{request()->is_up == 1 ? 'checked' : ''}}/>√ </label>
			<label> <input type="radio" name="is_up" value="2" {{request()->is_up == 2 ? 'checked' : ''}}/>× </label>
		</div>
		<select name="brand_id">
			<option value="">--请选择品牌--</option>
			@if(!empty($brand))
			@foreach($brand as $v)
				@if($v['brand_id'] == request()->brand_id)
					<option value="{{$v->brand_id}}" selected>{{$v->brand_name}}</option>
				@else
					<option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
				@endif
			@endforeach
			@endif
		</select>
		<select name="cate_id">
			<option value="">--请选择分类--</option>
			@if(!empty($cate))
			@foreach($cate as $v)
				@if($v['cate_id'] == request()->cate_id)
					<option value="{{$v->cate_id}}" selected>{!! str_repeat('&nbsp;&nbsp;',($v->nbsp-1)*5) !!}{{$v->cate_name}}</option>
				@else
					<option value="{{$v->cate_id}}">{!! str_repeat('&nbsp;&nbsp;',($v->nbsp-1)*5) !!}{{$v->cate_name}}</option>
				@endif
			@endforeach
			@endif
		</select>
		<input type="submit" value="筛选"/>
	</form>
</div>
					<div class="page-content">
							<div class="row">
							

									<div class="col-xs-12">

									
									
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>商品id</th>
														<th>商品名称</th>
														<th>商品价格</th>
														<th>货号</th>
														
														<th>库存</th>
														<th>赠送积分</th>
														<th>详情</th>
														<th>图片</th>
														
														<th>相册</th>
														<th>新品</th>
														<th>精品</th>
														<th>热卖</th>
														
														<th>上架</th>
														<th>品牌</th>
														<th>分类</th>
														<th>操作</th>
													</tr>
												</thead>

												<tbody>
													@if(!empty($goods))
													@foreach($goods as $v)
													<tr goods_id="{{$v->goods_id}}">
														<td>{{$v->goods_id}}</td>
														<td>{{$v->goods_name}}</td>
														<td>{{$v->goods_price}}</td>
														<td>{{$v->goods_no}}</td>
														
														<td>{{$v->goods_num}}</td>
														<td>{{$v->goods_score}}</td>
														<td>{{$v->goods_desc}}</td>
														<td><img src="/static/shangpin/img/{{$v->goods_img}}" width="100" height="60px"/></td>
														
														<td style="width: 250px;">
															<div style="height:64px;overflow: auto;">
																<!--君距伤,唇略伤-->
																<!--伤伤伤,无脑略略略-->
																<?php
																	$num = substr_count($v['goods_imgs'],'|');
																	$url_img = explode('|',$v['goods_imgs']);
																	for($i=0;$i<=$num;$i++){
																		//if($i>3){break;}
																		echo '<img src="/static/shangpin/imgs/'.$url_img[$i].'" width="100px" height="60px" style="margin-right:8px;margin-bottom:4px;"/>';
																	}	
																?>
															</div>
														</td>
														<td>{{$v->is_new == 1 ? '√' : '×'}}</td>
														<td>{{$v->is_best == 1 ? '√' : '×'}}</td>
														<td>{{$v->is_hot == 1 ? '√' : '×'}}</td>
														
														<td>{{$v->is_up == 1 ? '√' : '×'}}</td>
														<td>{{$v->brand_name}}</td>
														<td>{{$v->cate_name}}</td>
														<td> <button class="btn upd">编辑</button> <button class="btn btn-danger del">删除</button> </td>
													</tr>
													@endforeach
													@endif
												</tbody>
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->
{{$goods->links()}}
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
				
				<script src="/static/jquery.js" type="text/javascript" charset="utf-8"></script>
				<script type="text/javascript">
					$(document).on("click", "tr td .del", function(){
						var _this = $(this);// 获取当前对象
						var goods_id = _this.parents('tr').attr('goods_id');// 获取当前要删除的id
						if(confirm('是否确认删除')){
							$.get(
								"{:url('shangpin/del')}",
								{goods_id:goods_id},
								function(rey){
									if(rey != 1){
										alert("删除失败");
									}else{
										_this.parents('tr').remove();
									}
								}
							);
						}
					});
					$(document).on("click", "tr td .upd", function(){
						var _this = $(this);// 获取当前对象
						var goods_id = _this.parents('tr').attr('goods_id');// 获取当前要删除的id
						location.href="upd?goods_id="+goods_id;
					});
				</script>
