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
							<li class="active">负责房源</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
							<div class="row">
									<div class="col-xs-12">
									
<form class="form-horizontal" role="form" action="add_do" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 商品名称 </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name="goods_name" placeholder="商品名称"/>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 商品价格 </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name="goods_price" placeholder="商品价格"/>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 货号 </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name="goods_no" placeholder="货号"/>
		</div>
	</div>

	<div class="space-4"></div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 库存 </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name="goods_num" placeholder="库存"/>
		</div>
	</div>
	<div class="space-4"></div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 赠送积分 </label>
		<div class="col-sm-9">
			<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name="goods_score" placeholder="赠送积分"/>
		</div>
	</div>
	<div class="space-4"></div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 详情 </label>

		<div class="col-sm-9">
			<textarea id="score" name="goods_desc"></textarea>
		</div>
	</div>
	<div class="space-4"></div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 图片 </label>
		<div class="col-sm-9">
			<input type="file" id="form-field-1" class="col-xs-10 col-sm-5" name="goods_img"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 相册 </label>

		<div class="col-sm-9">
			<input type="file" id="form-field-1" class="col-xs-10 col-sm-5" name="goods_imgs[]" multiple/>
		</div>
	</div>
	<div class="space-4"></div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 新品 </label>

		<div class="col-sm-9">
			<label><input type="radio" name="is_new" id="is_new1" value="1" checked/>是</label>
			<label><input type="radio" name="is_new" id="is_new2" value="2" />否</label>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 精品 </label>

		<div class="col-sm-9">
			<label><input type="radio" name="is_best" id="is_best1" value="1" checked/>是</label>
			<label><input type="radio" name="is_best" id="is_best2" value="2" />否</label>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 热卖 </label>

		<div class="col-sm-9">
			<label><input type="radio" name="is_hot" id="is_hot1" value="1" checked/>是</label>
			<label><input type="radio" name="is_hot" id="is_hot2" value="2" />否</label>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 上架 </label>

		<div class="col-sm-9">
			<label><input type="radio" name="is_up" id="is_up1" value="1" checked/>是</label>
			<label><input type="radio" name="is_up" id="is_up2" value="2" />否</label>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 品牌 </label>

		<div class="col-sm-9">
			<select name="brand_id">
				<option value="">--请选择--</option>
				@foreach($brand as $v)
					<option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 分类 </label>

		<div class="col-sm-9">
			<select name="cate_id">
				<option value="">--请选择--</option>
				@foreach($cate as $v)
					<option value="{{$v->cate_id}}">{!! str_repeat('&nbsp;&nbsp;',($v->nbsp-1)*5) !!}{{$v->cate_name}}</option>
				@endforeach
			</select>
		</div>
	</div>
	
	
	
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info">
				<i class="icon-ok bigger-110"></i>
				添加
			</button>

			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="icon-undo bigger-110"></i>
				重置信息
			</button>
		</div>
	</div>
</form>
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
<script type="text/javascript" charset="utf-8" src="/static/utf8-php/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/utf8-php/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/static/utf8-php/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
	var ue = UE.getEditor('score');
</script>
				