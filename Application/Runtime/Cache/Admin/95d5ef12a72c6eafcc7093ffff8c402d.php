<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>用户组列表</title>
		<link rel="stylesheet" href="/./Application/Admin/Public/Css/public.css" />
	</head>
	<body>
		<div class="container">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>名称</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($group)): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><tr>
							<td width="5%" align="center"><?php echo ($g["id"]); ?></td>
							<td align="center"><?php echo ($g["title"]); ?></td>
							<td width="10%" align="center">
								[<a href="<?php echo U('editGroup',array('id'=>$g['id']));?>">修改</a>]
								[<a href="<?php echo U('delGroup',array('id'=>$g['id']));?>">删除</a>]
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
		</div>
		<script type="text/javascript" src="/./Application/Admin/Public/Js/jquery-1.11.min.js"></script>
		<script type="text/javascript" src="/./Application/Admin/Public/Js/index.js"></script>
	</body>
</html>