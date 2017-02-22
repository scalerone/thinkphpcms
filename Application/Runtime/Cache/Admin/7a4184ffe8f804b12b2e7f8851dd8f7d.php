<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>文章列表</title>
		<link rel="stylesheet" href="/./Application/Admin/Public/Css/public.css" />
	</head>
	<body>
		<div class="container">
			<form action="<?php echo U('updateSort');?>" method="post">
				<table class="table">
					<thead>
						<tr>
							<td width="3%"><input id="set" type="checkbox" name="" value=""></td>
							<td width="3%">ID</td>
							<td width="5%">排序</td>
							<td width="50%">标题</td>
							<td width="5%">点击量</td>
							<td width="8%">发布人</td>
							<td width="15%">发布时间</td>
							<td>管理操作</td>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?><tr>
								<td><input type="checkbox" name="id[]" value="<?php echo ($a["id"]); ?>"></td>
								<td><?php echo ($a["id"]); ?></td>
								<td><input type="text" name="<?php echo ($a["id"]); ?>" value="<?php echo ($a["sort"]); ?>" size="2"></td>
								<td><?php echo ($a["title"]); ?>
									<?php if($a["thumb"] != '' ): ?><img src="/./Application/Admin/Public/Images/thumb_img.gif" style="vertical-align: middle;" /><?php else: endif; ?>
								</td>
								<td><?php echo ($a["hits"]); ?></td>
								<td><?php echo ($a["author"]); ?></td>
								<td><?php echo (date("Y-m-d H:i:s",$a["addtime"])); ?></td>
								<td>
									<a href="<?php echo U('edit', array('catid'=>$a['catid'], 'id' => $a['id']));?>">[修改]</a>
									<a href="<?php echo U('del', array('catid'=>$a['catid'],'id' => $a['id']));?>">[删除]</a>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						<tr>
							<td colspan="8">
								<a class="selectAll btn" href="javascript:;" >全选</a>
								<a class="cancel btn" href="javascript:;">取消</a>
								<button>更新排序</button>
								<a class="delAll btn" href="javascript:;">批量删除</a>
								<a class="removeAll btn" href="javascript:;">批量移动</a>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	<script type="text/javascript" src="/./Application/Admin/Public/Js/jquery-1.11.min.js"></script>
	<script type="text/javascript" src="/./Application/Admin/Public/Js/index.js"></script>
	<script type="text/javascript">
		//批量删除
		$('.delAll').on('click',function(){
			var ids = [];
			var $inputs = $('.table tbody tr>td>input[type=checkbox]:checked');
			$inputs.each(function(){
				ids.push($(this).val());
			});
			var url = '<?php echo U("delAll");?>';
			ids = ids.toString();
			$.ajax({
				type: 'post',
				url: url,
				data: 'ids=' + ids,
				dataType: 'json',
				success: function(msg){
					console.log(msg);
					if(msg == '1'){
						$inputs.parents('tr').remove();		
					}
				},
				error: function(msg){
					console.log(msg);
				}
			});
		});
	</script>
	</body>
</html>