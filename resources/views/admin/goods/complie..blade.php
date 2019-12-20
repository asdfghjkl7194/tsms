<div class="main-content">
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
			try {
				ace.settings.check('breadcrumbs', 'fixed')
			} catch(e) {}
		</script>

		<ul class="breadcrumb">
			<li>
				<i class="icon-home home-icon"></i>
				<a href="#">首页</a>
			</li>
			<li class="active">安居客控制台</li>
			<li class="active">房源管理</li>
			<li class="active">账号设置</li>
			<li class="active">添加账号</li>
		</ul>
		<!-- .breadcrumb -->
	</div>

	<div class="page-content">
		<div class="row">

			<div class="col-xs-12">

				<form class="form-horizontal" role="form" method="post" action="{:url('goods/goods_compile_do')}" enctype="multipart/form-data">
					<input type="hidden" name="goods_id" id="goods_id" value="{$data.goods_id}" />
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名 </label>

						<div class="col-sm-9">
							<input type="text" id="form-field-1" placeholder="用户名" class="col-xs-10 col-sm-5"  name="goods_name" value="{$data.goods_name}"/>
						</div>
					</div>

					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 密码 </label>

						<div class="col-sm-9">
							<input type="text" id="form-field-2" placeholder="密码" class="col-xs-10 col-sm-5"  name="goods_pwd" value="{$data.goods_pwd}"/>
						</div>
					</div>

					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 网站 </label>

						<div class="col-sm-9">
							<textarea type="text" id="form-field-3" placeholder="网站" class="col-xs-10 col-sm-5"  name="goods_url" value=""/>{$data.goods_url}</textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 文件上传 </label>

						<div class="col-sm-9">
							<input type="file" id="form-field-4" class="col-xs-10 col-sm-5"  name="goods_file"/>
							<img src="/static/img/{$data.goods_file}" width="100px" height="60px"/>
						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">
							<button class="btn btn-info" type="submit">
								<i class="icon-ok bigger-110"></i>
								增加
							</button> &nbsp; &nbsp; &nbsp;
							<button class="btn" type="reset">
								<i class="icon-undo bigger-110"></i>
								重置
							</button>
						</div>
					</div>

					<div class="hr hr-24"></div>

				</form>
			</div>
			<!-- /span -->
		</div>
		<!-- /row -->

	</div>
	<!-- /.page-content -->
</div>
<!-- /.main-content -->

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
</div>
<!-- /#ace-settings-container -->