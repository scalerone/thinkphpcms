<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>添加权限</title>
		<link rel="stylesheet" href="/./Application/Admin/Public/Css/public.css" />
	</head>
	<body>
		<div class="container">
			<form action="<?php echo U('add');?>" method="post">
				<table class="table">
					<thead>
						<tr>
							<th colspan="2">添加权限</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td width="35%" align="right">上级权限:</td>
							<td>
								<select name="pid">
									<option value="0">==一级权限==</option>
									<?php if(is_array($rules)): $i = 0; $__LIST__ = $rules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option <?php echo ($pid==$v['id']?"selected='selected'":""); ?> value="<?php echo ($v["id"]); ?>"><?php echo ($v["html"]); echo ($v['level']=='1'?'':'├'); echo ($v["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</td>
						</tr>
						<tr>
							<td width="35%" align="right">权限名称:</td>
							<td><input type="text" name="title" value="" size="28" /></td>
						</tr>
						<tr>
							<td align="right">权限规则:</td>
							<td><input type="text" name="name" value="" size="28" /><span>模块名/控制器名/方法名 例如:Admin/Login/index</span></td>
						</tr>
						<tr>
							<td width="35%" align="right">排序:</td>
							<td><input type="text" name="sort" value="20" size="28" /></td>
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
	</body>
</html>