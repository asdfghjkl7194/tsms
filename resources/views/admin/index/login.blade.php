<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">注册</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="login_do" method="post" enctype="multipart/form-data" onsubmit="return verify()">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="用户名" name="users" id="users">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="密码" name="pwd" type="password" id="pwd1" value="">
                                </div>
								<div class="form-group">
                                    <input class="form-control" placeholder="确认密码" type="password" id="pwd2" value="">
                                </div>
								<div class="form-group">
                                    <input class="form-control" type="file" id="url" name="url" value="">
                                </div>
								
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block">注册</button>
                               
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="/static/jquery.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	function verify(){
		if($("#users").val() == "" || $("#pwd1").val() == "" || $("#pwd2").val() == ""){
			alert("用户名或密码不可为空");
			return false;
		}
		if($("#pwd1").val() == $("#pwd2").val()){
			return true;
		}else{
			alert("密码不一致");
			return false;
		}
	}
</script>