<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>添加管理员</title>
		<link rel="stylesheet" href="/./Application/Admin/Public/Css/public.css" />
	</head>
	<body>
		<div class="container">
			<form action="<?php echo U('add');?>" method="post">
				<table class="table">
					<thead>
						<tr>
							<th colspan="2">添加管理员</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td width="35%" align="right">用户名:</td>
							<td><input type="text" name="username" value="" size="58" /></td>
						</tr>
						<tr>
							<td width="8%" align="right">密码:</td>
							<td><input type="text" name="password" value="" size="58" /></td>
						</tr>
						<tr>
							<td align="right">邮箱:</td>
							<td><input type="text" name="email" value="" size="58"/></td>
						</tr>
						<tr>
							<td align="right">管理员组:</td>
							<td>
								<select name="group_id">
									<?php if(is_array($groups)): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><option value="<?php echo ($g["id"]); ?>"><?php echo ($g["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</td>
						</tr>
						<tr>
							<td align="right">状态:</td>
							<td colspan="2">
								<label>锁定<input type="radio" name="status" value="1"></label>
								<label>开启<input type="radio" checked="checked" name="status" value="0"></label>
							</td>
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