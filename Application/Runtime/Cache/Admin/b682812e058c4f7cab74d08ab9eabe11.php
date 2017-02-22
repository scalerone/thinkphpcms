<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>管理员列表</title>
		<link rel="stylesheet" href="/./Application/Admin/Public/Css/public.css" />
	</head>
	<body>
		<div class="container">
			<table class="table">
				<thead>
					<tr>
						<th>用户名</th>
						<th>所属用户组</th>
						<th>状态</th>
						<th>邮箱</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?><tr align="center">
							<td width="20%"><?php echo ($u["username"]); ?></td>
							<td><?php echo ($u['auth_group'][0]['title']); ?></td>
							<td width="5%"><?php echo ($u['status']=='1'?'正常':'锁定'); ?></td>
							<td width="20%"><?php echo ($u["email"]); ?></td>
							<td>
								[<a href="">修改</a>]
								[<a href="">删除</a>]
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
		</div>
		<script type="text/javascript" src="/./Application/Admin/Public/Js/jquery-1.11.min.js"></script>
		<script type="text/javascript" src="/./Application/Admin/Public/Js/index.js"></script>
	</body>
</html>