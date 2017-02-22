<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>栏目列表</title>
		<link rel="stylesheet" href="/./Application/Admin/Public/Css/public.css" />
	</head>
	<body>
		<div class="container">
			<form method="post" action="<?php echo U('updateSort');?>">
				<table class="table">
					<thead>
						<tr>
							<td width="5%">ID</td>
							<td width="5%">排序</td>
							<td width="50%">栏目名称</td>
							<td width="10%">类型</td>
							<td>管理操作</td>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($c["id"]); ?></td>
								<td><input type="text" size="2" name="<?php echo ($c["id"]); ?>" value="<?php echo ($c["sort"]); ?>">
								</td>
								<td><?php echo ($c["html"]); if($c["level"] > 1 ): ?>├─<?php else: endif; echo ($c["name"]); ?></td>
								<td>
									<?php switch($c["type"]): case "1": ?>文章<?php break;?>
									    <?php case "2": ?>单篇<?php break;?>
									    <?php default: ?>文章<?php endswitch;?>
								</td>
								<td>
									<a href="<?php echo U('add',array('catid'=>$c['id']));?>">[添加子栏目]</a>
									<a href="<?php echo U('edit',array('catid'=>$c['id']));?>">[修改]</a>
									<a href="javascript:if(confirm('确认要删除栏目吗？'))window.location.href = '<?php echo U("del",array("catid"=>$c["id"]));?>';">[删除]</a>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						<tr>
							<td colspan="5">
								<input type="submit" name="" value="更新排序">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</body>
</html>