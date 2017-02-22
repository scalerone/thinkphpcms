<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>添加文章</title>
		<script type="text/javascript" charset="utf-8" src="/./Application/Admin/Public/ueditor/ueditor.config.js"></script>
	    <script type="text/javascript" charset="utf-8" src="/./Application/Admin/Public/ueditor/ueditor.all.min.js"> </script>
	    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
	    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
	    <script type="text/javascript" charset="utf-8" src="/./Application/Admin/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
		<link rel="stylesheet" href="/./Application/Admin/Public/Css/public.css" />
	</head>
	<body>
		<div class="container">
			<form action="<?php echo U('add');?>" method="post" enctype="multipart/form-data">
				<table class="table">
					<thead>
						<tr>
							<th colspan="3">添加文章</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td align="right">所属栏目:</td>
							<td>
								<select name="catid">
									<?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><option value="<?php echo ($c["id"]); ?>" <?php echo ($pid==$c['id']?"selected='selected'":""); ?>><?php echo ($c["html"]); if($c["level"] > 1 ): ?>├<?php else: endif; echo ($c["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</td>
							<td align="center">
								<h3>文章缩略图</h3>
							</td>
						</tr>
						<tr>
							<td width="8%" align="right">标题</td>
							<td><input type="text" name="title" value="" size="58" /></td>
							<td width="35%" rowspan="3">
								<div class="imgBox">
									<div class="controller">
										<input id="file" type="file" name="imgFile" value="">
										<input type="hidden" name="thumb" value="" id="_thumb">
										<button id="imgUpload" onclick="UpladFile();return false;">上传</button>
										<a href="javascript:;" class="btn" id="clear">取消</a>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td align="right">关键字:</td>
							<td><input type="text" name="keyword" value="" size="58"/></td>
						</tr>
						<tr>
							<td align="right">摘要:</td>
							<td>
								<textarea name="summary" cols="60" rows="4"></textarea>
							</td>
						</tr>
						<tr>
							<td align="right">编辑:</td>
							<td>
								<input type="text" name="author" value="" size="58"/>
							</td>
						</tr>
						<tr>
							<td align="right">内容:</td>
							<td colspan="2"><textarea name="content" id="content" style="width:100%;height:460px;"></textarea></td>
						</tr>
						<tr>
							<td colspan="3" align="center">
								<input type="submit" value="添加" id="btn" />
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<script type="text/javascript" src="/./Application/Admin/Public/Js/jquery-1.11.min.js"></script>
		<script type="text/javascript" src="/./Application/Admin/Public/Js/index.js"></script>
		<script type="text/javascript">
		    //实例化编辑器
		    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
		    var ue = UE.getEditor('content');
		</script>
		<script type="text/javascript">
			var xhr;
		    function createXMLHttpRequest()
		    {
		        if(window.ActiveXObject)
		        {
		            xhr = new ActiveXObject("Microsoft.XMLHTTP");
		        }
		        else if(window.XMLHttpRequest)
		        {
		            xhr = new XMLHttpRequest();
		        }
		    }
			function UpladFile()
		    {
		    	//alert(1);
		        var thumb = document.getElementById("file").files[0];
		        var action = '<?php echo U("thumbUpload");?>';
		        var form = new FormData();
		        form.append("thumb", thumb);
		        createXMLHttpRequest();
		        xhr.onreadystatechange = handleStateChange;
		        xhr.open("post", action, true);
		        xhr.send(form);
		    }
		    function handleStateChange()
		    {
		        if(xhr.readyState == 4)
		        {
		            if (xhr.status == 200 || xhr.status == 0)
		            {
		                var result = JSON.parse(xhr.responseText);
		               	if(result.status == 1){
		               		//alert('上传成功!');
		               		$('#file').before('<img name="thumb" class="_img" alt="" src="'+result.thumb+'" width="245px" height="120px" />');
		               		$('#_thumb').val(result.thumb);
		               	}
		            } 
		        }
		    }
		    $('#clear').click(function(){
		    	$('._img').remove();
		    	$('#_thumb').val();
		    });
		</script>
	</body>
</html>