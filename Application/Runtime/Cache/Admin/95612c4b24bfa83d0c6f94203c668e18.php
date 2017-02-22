<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>添加栏目</title>
		<link rel="stylesheet" href="/./Application/Admin/Public/Css/public.css" />
	</head>
	<body>
		<div class="container">
			<form action="<?php echo U('add');?>" method="post" enctype="multipart/form-data">
				<table class="table">
					<thead>
						<tr>
							<th colspan="2">添加栏目</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td align="right">上级栏目:</td>
							<td>
								<select name="pid">
									<option value="0">==顶级栏目==</option>
									<?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><option value="<?php echo ($c["id"]); ?>" <?php echo ($pid==$c['id']?"selected='selected'":""); ?>><?php echo ($c["html"]); if($c["level"] > 1 ): ?>├<?php else: endif; echo ($c["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</td>
						</tr>
						<tr>
							<td width="25%" align="right">栏目名称</td>
							<td><input type="text" name="name" value="" /></td>
						</tr>
						<tr>
							<td align="right">栏目英文名:</td>
							<td><input type="text" name="name_en" value="" /></td>
						</tr>
						<tr>
							<td align="right">栏目类型:</td>
							<td>
								<label>
									<input type="radio" name="type" value="1" checked="checked"/>文章
								</label>
								<label>
									<input type="radio" name="type" value="2" />单篇
								</label>
							</td>
						</tr>
						<tr>
							<td align="right">栏目缩略图:</td>
							<td><input type="file" name="thumb" value="" size="45"/></td>
						</tr>
						<tr>
							<td align="right">栏目描述:</td>
							<td>
								<textarea name="description" cols="70" rows="6"></textarea>
							</td>
						</tr>
						<tr>
							<td align="right">排序:</td>
							<td><input type="text" name="sort" value="50"/></td>
						</tr>
						<tr>
							<td align="right">是否显示:</td>
							<td>
								<label>
									<input type="radio" name="status" value="1" checked="checked"/>是
								</label>
								<label>
									<input type="radio" name="status" value="0" />否
								</label>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input type="submit" value="添加" id="btn" />
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	<script type="text/javascript" src="/./Application/Admin/Public/Js/jquery-1.11.min.js"></script>
	<script type="text/javascript" src="/./Application/Admin/Public/Js/index.js"></script>
	</body>
</html>