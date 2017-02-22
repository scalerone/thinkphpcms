<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>权限列表</title>
		<link rel="stylesheet" href="/./Application/Admin/Public/Css/public.css" />
	</head>
	<body>
		<div class="container">
			<form action="<?php echo U('add');?>" method="post">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>排序</th>
							<th>名称</th>
							<th>规则</th>
							<th>状态</th>
							<th>添加时间</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($rules)): $i = 0; $__LIST__ = $rules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
								<td width="5%" align="center"><?php echo ($v["id"]); ?></td>
								<td width="5%" align="center"><input type="text" name="sort" value="<?php echo ($v["sort"]); ?>" size="2"></td>
								<td width="20%" align="left"><?php echo ($v["html"]); echo ($v['level']=='1'?'':'├─'); echo ($v["title"]); ?></td>
								<td align="center"><?php echo ($v["name"]); ?></td>
								<td width="5%" align="center"><?php echo ($v['status']=='1'?'开启':'锁定'); ?></td>
								<td width="15%" align="center"><?php echo (date('Y-m-d H:i:s',$v["createtime"])); ?></td>
								<td align="center">
									<?php if($v['pid'] == 0): ?>[<a href="<?php echo U('add',array('pid'=>$v['id']));?>">添加子节点</a>]<?php endif; ?>
									[<a href="<?php echo U('edit',array('id'=>$v['id']));?>">修改</a>]
									[<a href="<?php echo U('del',array('id'=>$v['id']));?>">删除</a>]
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</form>
		</div>
		<script type="text/javascript" src="/./Application/Admin/Public/Js/jquery-1.11.min.js"></script>
		<script type="text/javascript" src="/./Application/Admin/Public/Js/index.js"></script>
	</body>
</html>