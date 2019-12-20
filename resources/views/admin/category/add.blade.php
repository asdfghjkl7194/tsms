<style type="text/css">
	#category ul{
		display: none;
	}
</style>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">内容添加</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="add_do" method="post">
                            <fieldset>
                                <div class="form-group">
										名称:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input size="20" placeholder="新名称" name="cate_name"  >
                                </div>
                                <div class="form-group">
								显示:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   <label>
										<input type="radio" name="cate_show" value="1" checked>是
								   </label>&nbsp;
								   <label>
										<input type="radio" name="cate_show" value="2">否
								   </label>
                                </div>
								<div class="form-group">
								标题显示:&nbsp;
                                   <label>
										<input type="radio" name="cate_new_show" value="1">是
								   </label>&nbsp;
								   <label>
										<input type="radio" name="cate_new_show" value="2" checked>否
								   </label>
                                </div>
								<div class="form-group">
								选择分类:&nbsp;
                                   <select name="parent_id" id="">
									<option value="0">--请选择--</option>
									@if(!empty($data))
									@foreach($data as $v)
									<option value="{{$v->cate_id}}">{!! str_repeat('&nbsp;&nbsp;',($v->nbsp-1)*5) !!}<span>{{$v->cate_name}}</span></option>
									@endforeach
									@endif
								   </select>
								</div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block">添加</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>