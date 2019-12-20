<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>上传</title>
	<script src="__STATIC__/jquery.js" type="text/javascript" charset="utf-8"></script>
	<style type="text/css">
		.btn{
			display: inline-block;
			width: 120px;
			height: 40px;
			cursor: pointer;
			text-align: center;
			line-height: 40px;
			background-color: #409EFF;
			color: #fff;
			border-radius: 4px;
			letter-spacing: .4em;
			vertical-align: middle;
			margin-left: 40px;
		}
		#fileUpLoad{
			background-color: orange;
			width: 400px;
			height: 200px;
			opacity: 0;
			cursor: pointer;
		}
		.uploadBox{
			display: inline-block;
			position: relative;
			vertical-align: middle;
			outline: 1px solid #606266;
		}
		.uploadBox div{
			position: absolute;
			top: 0;
			width: 100%;
			height: 100%;
		}
		.uploadBox .prompt{
			z-index: -2;
		}
		.uploadBox .fileName{
			z-index: -1;
			line-height: 26px;
		    font-size: 14px;
		    padding: 10px;
		}
		.uploadBox div p{
			text-align: center;
			color: #909399;
			line-height: 70px;
		}
	</style>
</head>
<body>
	<h2>ajax上传文件</h2>
	<div>
		<div class="uploadBox">
			<div class="prompt">
				<p><i>请点击此处上传文件</i></p>
				<p><i>或拖动文件到此处</i></p>
			</div>
			<div class="fileName"></div>
			<input type="file" name="fileName" id="fileUpLoad">
		</div>
		<span class="btn">上传</span>
	</div>
 
<script type="text/javascript">
	$(function(){
 
		// 检测是否选择文件，如果选择，返回文件对象;如果没选择，返回false
		function checkFile(){
			// 获取文件对象(该对象的类型是[object FileList]，其下有个length属性)
			var fileList = $('#fileUpLoad')[0].files;
			
			// 如果文件对象的length属性为0，就是没文件
			if (fileList.length === 0) {
				console.log('没选择文件');
				return false;
			};
			return fileList[0];
		};
 
		// 文件选择成功，显示文件名称
		$('#fileUpLoad').change(function(){
			var file = checkFile();
			if (!file) {
				return false;
			};
 
			var name = $('#fileUpLoad')[0].files[0].name;
			$('.fileName').text(name);
		});
 
		$('.btn').click(function(){
			var file = checkFile();
			if (!file) {
				alert('请先选择文件');
				return false;
			};

			// 构建form数据
			var formFile = new FormData();
            formFile.append("action", "UploadPath");
            //把文件放入form对象中  
            formFile.append("file", file); 
 
            // ajax提交
            $.ajax({
            	url: "ajax_img",
               	data: formFile,
               	type: "POST",
               	dataType: "json",
               	cache: false,			//上传文件无需缓存
               	processData: false,		//用于对data参数进行序列化处理 这里必须false
               	contentType: false, 	//必须
               	success: function(result){
               		alert('上传成功');
               	},
               	error: function(result){
               		alert('上传失败');
               	}
            });
		});
	})
</script>

</body>
</html>
